<?php

if (!defined('ABSPATH')) {
    exit;
}

function dashvio_get_openai_api_key() {
    if (defined('OPENAI_API_KEY') && !empty(OPENAI_API_KEY)) {
        return OPENAI_API_KEY;
    }
    
    $api_key = dashvio_get_theme_option('dashassist_openai_api_key', '');
    return $api_key;
}

function dashvio_call_openai_api($prompt, $max_tokens = 500, $temperature = 0.7) {
    $api_key = dashvio_get_openai_api_key();
    
    if (empty($api_key)) {
        return array(
            'success' => false,
            'error' => 'OpenAI API key is not configured. Please configure it in DashAssist AI settings.'
        );
    }
    
    $api_key = trim($api_key);
    
    if (empty($api_key) || strlen($api_key) < 20) {
        return array(
            'success' => false,
            'error' => 'Invalid API key format. Please check your API key in DashAssist AI settings or .env file.'
        );
    }
    
    $url = 'https://api.openai.com/v1/chat/completions';
    
    $body = array(
        'model' => 'gpt-3.5-turbo',
        'messages' => array(
            array(
                'role' => 'user',
                'content' => $prompt
            )
        ),
        'max_tokens' => $max_tokens,
        'temperature' => $temperature
    );
    
    $args = array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key
        ),
        'body' => json_encode($body),
        'timeout' => 30
    );
    
    $response = wp_remote_post($url, $args);
    
    if (is_wp_error($response)) {
        return array(
            'success' => false,
            'error' => $response->get_error_message()
        );
    }
    
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body, true);
    
    if ($response_code !== 200) {
        $error_message = isset($data['error']['message']) ? $data['error']['message'] : 'Unknown error occurred';
        return array(
            'success' => false,
            'error' => $error_message
        );
    }
    
    if (isset($data['choices'][0]['message']['content'])) {
        return array(
            'success' => true,
            'content' => trim($data['choices'][0]['message']['content'])
        );
    }
    
    return array(
        'success' => false,
        'error' => 'Invalid response from OpenAI API'
    );
}

add_action('wp_ajax_dashassist_rewrite_text', 'dashassist_ajax_rewrite_text');
add_action('wp_ajax_nopriv_dashassist_rewrite_text', 'dashassist_ajax_rewrite_text');

function dashassist_ajax_rewrite_text() {
    if (!dashvio_verify_nonce($_POST['nonce'] ?? '', 'dashassist-nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
        return;
    }
    
    if (!dashvio_is_user_allowed()) {
        wp_send_json_error(array('message' => 'You must be logged in to use this feature'));
        return;
    }
    
    $text = isset($_POST['text']) ? sanitize_textarea_field($_POST['text']) : '';
    $tone = isset($_POST['tone']) ? sanitize_text_field($_POST['tone']) : 'professional';
    
    if (empty($text)) {
        wp_send_json_error(array('message' => 'Text is required'));
        return;
    }
    
    $prompt = "Rewrite the following text in a {$tone} tone. Keep the same meaning and key information, but improve clarity and engagement:\n\n{$text}";
    
    $result = dashvio_call_openai_api($prompt, 1000, 0.7);
    
    if ($result['success']) {
        wp_send_json_success(array('rewritten_text' => $result['content']));
    } else {
        wp_send_json_error(array('message' => $result['error']));
    }
}

add_action('wp_ajax_dashassist_suggest_keywords', 'dashassist_ajax_suggest_keywords');
add_action('wp_ajax_nopriv_dashassist_suggest_keywords', 'dashassist_ajax_suggest_keywords');

function dashassist_ajax_suggest_keywords() {
    if (!dashvio_verify_nonce($_POST['nonce'] ?? '', 'dashassist-nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
        return;
    }
    
    if (!dashvio_is_user_allowed()) {
        wp_send_json_error(array('message' => 'You must be logged in to use this feature'));
        return;
    }
    
    $text = isset($_POST['text']) ? sanitize_textarea_field($_POST['text']) : '';
    $count = isset($_POST['count']) ? absint($_POST['count']) : 10;
    
    if (empty($text)) {
        wp_send_json_error(array('message' => 'Text is required'));
        return;
    }
    
    $prompt = "Based on the following text, suggest {$count} relevant SEO keywords (single words or short phrases). Return only a comma-separated list of keywords:\n\n{$text}";
    
    $result = dashvio_call_openai_api($prompt, 200, 0.5);
    
    if ($result['success']) {
        $keywords = array_map('trim', explode(',', $result['content']));
        $keywords = array_filter($keywords);
        wp_send_json_success(array('keywords' => array_values($keywords)));
    } else {
        wp_send_json_error(array('message' => $result['error']));
    }
}

add_action('wp_ajax_dashassist_create_seo', 'dashassist_ajax_create_seo');
add_action('wp_ajax_nopriv_dashassist_create_seo', 'dashassist_ajax_create_seo');

function dashassist_ajax_create_seo() {
    if (!dashvio_verify_nonce($_POST['nonce'] ?? '', 'dashassist-nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce'));
        return;
    }
    
    if (!dashvio_is_user_allowed()) {
        wp_send_json_error(array('message' => 'You must be logged in to use this feature'));
        return;
    }
    
    $content = isset($_POST['content']) ? sanitize_textarea_field($_POST['content']) : '';
    $focus_keyword = isset($_POST['focus_keyword']) ? sanitize_text_field($_POST['focus_keyword']) : '';
    
    if (empty($content)) {
        wp_send_json_error(array('message' => 'Content is required'));
        return;
    }
    
    $keyword_part = !empty($focus_keyword) ? " Focus on the keyword: {$focus_keyword}." : '';
    $prompt = "Create an SEO-optimized title (max 60 characters) and meta description (max 160 characters) for the following content.{$keyword_part} Return the response in this exact format:\nTITLE: [title here]\nDESCRIPTION: [description here]\n\nContent:\n{$content}";
    
    $result = dashvio_call_openai_api($prompt, 300, 0.7);
    
    if ($result['success']) {
        $response = $result['content'];
        $title = '';
        $description = '';
        
        if (preg_match('/TITLE:\s*(.+?)(?:\n|$)/i', $response, $title_match)) {
            $title = trim($title_match[1]);
        }
        
        if (preg_match('/DESCRIPTION:\s*(.+?)(?:\n|$)/i', $response, $desc_match)) {
            $description = trim($desc_match[1]);
        }
        
        if (empty($title) || empty($description)) {
            $lines = explode("\n", $response);
            if (count($lines) >= 2) {
                $title = trim($lines[0]);
                $description = trim($lines[1]);
            }
        }
        
        wp_send_json_success(array(
            'title' => $title,
            'description' => $description
        ));
    } else {
        wp_send_json_error(array('message' => $result['error']));
    }
}

