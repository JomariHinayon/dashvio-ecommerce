<?php

if (!defined('ABSPATH')) {
    exit;
}

class Dashvio_Elementor_FAQs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dashvio_faqs';
    }

    public function get_title() {
        return esc_html__('Dashvio FAQs', 'dashvio');
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['dashvio'];
    }

    public function get_keywords() {
        return ['faq', 'accordion', 'questions', 'dashvio'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'dashvio'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Section Title', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Frequently Asked Questions',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faq_question',
            [
                'label' => esc_html__('Question', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'What is this?',
            ]
        );

        $repeater->add_control(
            'faq_answer',
            [
                'label' => esc_html__('Answer', 'dashvio'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'This is the answer to your question.',
            ]
        );

        $this->add_control(
            'faqs_list',
            [
                'label' => esc_html__('FAQs', 'dashvio'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_question' => 'What is included?',
                        'faq_answer' => 'All features are included in the package.',
                    ],
                    [
                        'faq_question' => 'How do I get support?',
                        'faq_answer' => 'You can contact us through our support system.',
                    ],
                ],
                'title_field' => '{{{ faq_question }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="dashvio-faqs-section">
            <?php if (!empty($settings['title'])) : ?>
                <h2><?php echo esc_html($settings['title']); ?></h2>
            <?php endif; ?>
            
            <div class="dashvio-faqs-list">
                <?php foreach ($settings['faqs_list'] as $index => $faq) : 
                    $faq_id = 'faq-' . $this->get_id() . '-' . $index;
                ?>
                    <div class="dashvio-faq-item">
                        <button class="dashvio-faq-question" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr($faq_id); ?>">
                            <?php echo esc_html($faq['faq_question']); ?>
                            <span class="dashvio-faq-icon">+</span>
                        </button>
                        <div class="dashvio-faq-answer" id="<?php echo esc_attr($faq_id); ?>">
                            <p><?php echo esc_html($faq['faq_answer']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var faqId = 'faq-' + view.getID();
        #>
        <section class="dashvio-faqs-section">
            <# if (settings.title) { #>
                <h2>{{{ settings.title }}}</h2>
            <# } #>
            
            <div class="dashvio-faqs-list">
                <# _.each(settings.faqs_list, function(faq, index) { 
                    var currentFaqId = faqId + '-' + index;
                #>
                    <div class="dashvio-faq-item">
                        <button class="dashvio-faq-question" type="button" aria-expanded="false" aria-controls="{{{ currentFaqId }}}">
                            {{{ faq.faq_question }}}
                            <span class="dashvio-faq-icon">+</span>
                        </button>
                        <div class="dashvio-faq-answer" id="{{{ currentFaqId }}}">
                            <p>{{{ faq.faq_answer }}}</p>
                        </div>
                    </div>
                <# }); #>
            </div>
        </section>
        <?php
    }
}

