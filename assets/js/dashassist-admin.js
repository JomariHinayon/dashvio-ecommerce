(function($) {
    'use strict';
    
    if (typeof $ === 'undefined' && typeof jQuery !== 'undefined') {
        $ = jQuery;
    }
    
    if (typeof $ === 'undefined') {
        console.error('DashAssist: jQuery is not loaded. Please ensure jQuery is available.');
        return;
    }
    
    if (typeof dashassistData === 'undefined') {
        console.error('DashAssist: dashassistData is not defined. Script may not be loaded correctly.');
        return;
    }
    
    function initDashAssistTools() {
        if (typeof elementor !== 'undefined') {
            initElementorIntegration();
        }
        
        if ($('#wp-content-editor-container').length || $('#content').length) {
            initClassicEditorIntegration();
        }
        
        if (typeof wp !== 'undefined' && wp.data && wp.data.select('core/editor')) {
            initGutenbergIntegration();
        }
    }
    
    function initElementorIntegration() {
        if (typeof elementor === 'undefined') {
            return;
        }
        
        function addDashAssistToElementorControls() {
            $('#elementor-panel .elementor-control-input-wrapper').each(function() {
                var $wrapper = $(this);
                var $input = $wrapper.find('input[type="text"], textarea');
                
                if ($input.length && !$input.data('dashassist-initialized')) {
                    $input.data('dashassist-initialized', true);
                    
                    var $control = $wrapper.closest('.elementor-control');
                    var controlName = $control.data('setting') || '';
                    
                    if (!controlName) {
                        var $label = $control.find('.elementor-control-title');
                        if ($label.length) {
                            controlName = $label.text().toLowerCase().trim().replace(/\s+/g, '_');
                        }
                    }
                    
                    var $aiLink = $('<a href="#" class="dashassist-ai-link">Edit with DashAssist AI</a>');
                    $aiLink.hide();
                    
                    var $controlContent = $wrapper.closest('.elementor-control-content');
                    if ($controlContent.length) {
                        $controlContent.append($aiLink);
                    } else {
                        $wrapper.after($aiLink);
                    }
                    
                    var typingTimer;
                    var hideTimer;
                    
                    function showLink() {
                        clearTimeout(hideTimer);
                        $aiLink.stop().fadeIn(200);
                    }
                    
                    function hideLink() {
                        clearTimeout(hideTimer);
                        hideTimer = setTimeout(function() {
                            if (!$aiLink.is(':hover') && !$('.dashassist-modal').is(':visible')) {
                                $aiLink.stop().fadeOut(200);
                            }
                        }, 2000);
                    }
                    
                    $input.on('input keyup keydown', function(e) {
                        var text = $input.val() || '';
                        
                        clearTimeout(typingTimer);
                        
                        if (text.length > 0) {
                            showLink();
                            typingTimer = setTimeout(function() {
                                hideLink();
                            }, 1500);
                        } else {
                            $aiLink.fadeOut(200);
                        }
                    });
                    
                    $input.on('focus', function() {
                        var text = $input.val() || '';
                        if (text.length > 0) {
                            showLink();
                        }
                    });
                    
                    $input.on('blur', function() {
                        setTimeout(function() {
                            if (!$aiLink.is(':hover') && !$('.dashassist-modal').is(':visible')) {
                                hideLink();
                            }
                        }, 300);
                    });
                    
                    $aiLink.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var currentText = $input.val() || '';
                        var widgetModel = null;
                        
                        try {
                            if (elementor.panels && elementor.panels.currentView && elementor.panels.currentView.currentView && elementor.panels.currentView.currentView.model) {
                                widgetModel = elementor.panels.currentView.currentView.model;
                            }
                        } catch(err) {
                            console.log('DashAssist: Could not get widget model', err);
                        }
                        
                        showRewriteModal($input, function(result) {
                            $input.val(result);
                            $input.trigger('input');
                            $input.trigger('change');
                            
                            if (widgetModel && controlName) {
                                try {
                                    widgetModel.setSetting(controlName, result);
                                    if (elementor.saver && elementor.saver.updateEditor) {
                                        elementor.saver.updateEditor();
                                    } else if (elementor.channels && elementor.channels.editor) {
                                        elementor.channels.editor.trigger('change');
                                    }
                                } catch(err) {
                                    console.log('DashAssist: Error updating widget model', err);
                                }
                            }
                        });
                    });
                    
                    $aiLink.on('mouseenter', function() {
                        clearTimeout(hideTimer);
                    });
                    
                    console.log('DashAssist: Initialized for control:', controlName);
                }
            });
        }
        
        if (elementor.hooks) {
            elementor.hooks.addAction('panel/open_editor/widget', function(panel, model, view) {
                setTimeout(function() {
                    addDashAssistToElementorControls();
                }, 500);
            });
            
            elementor.hooks.addAction('panel/open_editor/global', function(panel, model, view) {
                setTimeout(function() {
                    addDashAssistToElementorControls();
                }, 500);
            });
        }
        
        var observer = new MutationObserver(function(mutations) {
            addDashAssistToElementorControls();
        });
        
        var $panel = $('#elementor-panel');
        if ($panel.length) {
            observer.observe($panel[0], {
                childList: true,
                subtree: true,
                attributes: false
            });
        }
        
        setInterval(function() {
            if ($('#elementor-panel').length && $('#elementor-panel').is(':visible')) {
                addDashAssistToElementorControls();
            }
        }, 1500);
        
        setTimeout(addDashAssistToElementorControls, 500);
        
        $(document).on('input', '#elementor-panel input[type="text"], #elementor-panel textarea', function() {
            var $input = $(this);
            if (!$input.data('dashassist-initialized')) {
                setTimeout(function() {
                    addDashAssistToElementorControls();
                }, 100);
            }
        });
    }
    
    function initClassicEditorIntegration() {
        var $editor = $('#content, #wp-content-editor-container textarea');
        if ($editor.length && !$editor.siblings('.dashassist-ai-buttons').length) {
            var $buttonsContainer = $('<div class="dashassist-ai-buttons dashassist-classic-editor"></div>');
            $buttonsContainer.append(createAIButtons($editor, function(result) {
                if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
                    tinyMCE.activeEditor.setContent(result);
                } else {
                    $editor.val(result);
                }
            }));
            $editor.after($buttonsContainer);
        }
    }
    
    function initGutenbergIntegration() {
        if (typeof wp !== 'undefined' && wp.domReady) {
            wp.domReady(function() {
                setTimeout(function() {
                    addGutenbergAIButtons();
                }, 1000);
            });
        }
    }
    
    function addGutenbergAIButtons() {
        $('.block-editor-rich-text__editable').each(function() {
            var $editor = $(this);
            if (!$editor.siblings('.dashassist-ai-buttons').length && $editor.is(':visible')) {
                var $buttonsContainer = $('<div class="dashassist-ai-buttons dashassist-gutenberg"></div>');
                $buttonsContainer.append(createAIButtons($editor, function(result) {
                    var block = wp.data.select('core/block-editor').getSelectedBlock();
                    if (block) {
                        var attributes = {};
                        attributes[block.attributes.content ? 'content' : 'text'] = result;
                        wp.data.dispatch('core/block-editor').updateBlockAttributes(block.clientId, attributes);
                    }
                }));
                $editor.after($buttonsContainer);
            }
        });
    }
    
    function createAIButtons($editor, callback) {
        var $container = $('<div class="dashassist-ai-toolbar"></div>');
        
        var $rewriteBtn = $('<button type="button" class="dashassist-btn dashassist-rewrite" title="Rewrite Text"><span class="dashicons dashicons-edit"></span> Rewrite</button>');
        var $keywordsBtn = $('<button type="button" class="dashassist-btn dashassist-keywords" title="Suggest Keywords"><span class="dashicons dashicons-tag"></span> Keywords</button>');
        var $seoBtn = $('<button type="button" class="dashassist-btn dashassist-seo" title="Create SEO"><span class="dashicons dashicons-search"></span> SEO</button>');
        
        $rewriteBtn.on('click', function() {
            showRewriteModal($editor, callback);
        });
        
        $keywordsBtn.on('click', function() {
            showKeywordsModal($editor, callback);
        });
        
        $seoBtn.on('click', function() {
            showSEOModal($editor, callback);
        });
        
        $container.append($rewriteBtn, $keywordsBtn, $seoBtn);
        return $container;
    }
    
    function showRewriteModal($editor, callback) {
        var currentText = getEditorText($editor);
        
        var $modal = $('<div class="dashassist-modal"><div class="dashassist-modal-content"><span class="dashassist-close">&times;</span><h2>Rewrite Text</h2><div class="dashassist-form-group"><label>Tone:</label><select id="dashassist-tone"><option value="professional" selected>Professional</option><option value="casual">Casual</option><option value="friendly">Friendly</option><option value="formal">Formal</option><option value="creative">Creative</option></select></div><div class="dashassist-form-group"><label>Text to rewrite:</label><textarea id="dashassist-text" rows="6">' + currentText + '</textarea></div><button type="button" class="dashassist-submit">Rewrite</button><div class="dashassist-result"></div></div></div>');
        
        $('body').append($modal);
        
        $modal.find('.dashassist-close, .dashassist-modal').on('click', function(e) {
            if (e.target === this) {
                $modal.remove();
            }
        });
        
        $modal.find('.dashassist-submit').on('click', function() {
            var $btn = $(this);
            var $result = $modal.find('.dashassist-result');
            var text = $('#dashassist-text').val();
            var tone = $('#dashassist-tone').val();
            
            if (!text.trim()) {
                $result.html('<p class="dashassist-error">Please enter text to rewrite.</p>');
                return;
            }
            
            $btn.prop('disabled', true).text('Rewriting...');
            $result.html('<p class="dashassist-loading">Processing...</p>');
            
            if (typeof dashassistData === 'undefined') {
                $result.html('<p class="dashassist-error">DashAssist AI is not properly configured. Please check settings.</p>');
                $btn.prop('disabled', false).text('Rewrite');
                return;
            }
            
            $.ajax({
                url: dashassistData.ajaxurl,
                type: 'POST',
                data: {
                    action: 'dashassist_rewrite_text',
                    nonce: dashassistData.nonce,
                    text: text,
                    tone: tone
                },
                success: function(response) {
                    if (response.success) {
                        $result.html('<div class="dashassist-success"><h3>Rewritten Text:</h3><textarea class="dashassist-output" rows="6" readonly>' + response.data.rewritten_text + '</textarea><button type="button" class="dashassist-use-btn">Use This Text</button></div>');
                        $modal.find('.dashassist-use-btn').on('click', function() {
                            if (callback) {
                                callback(response.data.rewritten_text);
                            }
                            $modal.remove();
                        });
                    } else {
                        $result.html('<p class="dashassist-error">' + (response.data.message || 'An error occurred') + '</p>');
                    }
                },
                error: function() {
                    $result.html('<p class="dashassist-error">Network error. Please try again.</p>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Rewrite');
                }
            });
        });
    }
    
    function showKeywordsModal($editor, callback) {
        var currentText = getEditorText($editor);
        
        var $modal = $('<div class="dashassist-modal"><div class="dashassist-modal-content"><span class="dashassist-close">&times;</span><h2>Suggest Keywords</h2><div class="dashassist-form-group"><label>Content:</label><textarea id="dashassist-keywords-text" rows="6">' + currentText + '</textarea></div><div class="dashassist-form-group"><label>Number of keywords:</label><input type="number" id="dashassist-keywords-count" value="10" min="5" max="20"></div><button type="button" class="dashassist-submit">Get Keywords</button><div class="dashassist-result"></div></div></div>');
        
        $('body').append($modal);
        
        $modal.find('.dashassist-close, .dashassist-modal').on('click', function(e) {
            if (e.target === this) {
                $modal.remove();
            }
        });
        
        $modal.find('.dashassist-submit').on('click', function() {
            var $btn = $(this);
            var $result = $modal.find('.dashassist-result');
            var text = $('#dashassist-keywords-text').val();
            var count = parseInt($('#dashassist-keywords-count').val()) || 10;
            
            if (!text.trim()) {
                $result.html('<p class="dashassist-error">Please enter content.</p>');
                return;
            }
            
            if (typeof dashassistData === 'undefined') {
                $result.html('<p class="dashassist-error">DashAssist AI is not properly configured. Please check settings.</p>');
                $btn.prop('disabled', false).text('Get Keywords');
                return;
            }
            
            $btn.prop('disabled', true).text('Generating...');
            $result.html('<p class="dashassist-loading">Processing...</p>');
            
            $.ajax({
                url: dashassistData.ajaxurl,
                type: 'POST',
                data: {
                    action: 'dashassist_suggest_keywords',
                    nonce: dashassistData.nonce,
                    text: text,
                    count: count
                },
                success: function(response) {
                    if (response.success) {
                        var keywords = response.data.keywords || [];
                        var keywordsText = keywords.join(', ');
                        $result.html('<div class="dashassist-success"><h3>Suggested Keywords:</h3><div class="dashassist-keywords-list">' + keywords.map(function(k) {
                            return '<span class="dashassist-keyword-tag">' + k + '</span>';
                        }).join('') + '</div><textarea class="dashassist-output" rows="3" readonly>' + keywordsText + '</textarea><button type="button" class="dashassist-use-btn">Copy Keywords</button></div>');
                        $modal.find('.dashassist-use-btn').on('click', function() {
                            var $output = $modal.find('.dashassist-output');
                            $output.select();
                            document.execCommand('copy');
                            $(this).text('Copied!').prop('disabled', true);
                            setTimeout(function() {
                                $modal.remove();
                            }, 1000);
                        });
                    } else {
                        $result.html('<p class="dashassist-error">' + (response.data.message || 'An error occurred') + '</p>');
                    }
                },
                error: function() {
                    $result.html('<p class="dashassist-error">Network error. Please try again.</p>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Get Keywords');
                }
            });
        });
    }
    
    function showSEOModal($editor, callback) {
        var currentText = getEditorText($editor);
        
        var $modal = $('<div class="dashassist-modal"><div class="dashassist-modal-content"><span class="dashassist-close">&times;</span><h2>Create SEO Title & Description</h2><div class="dashassist-form-group"><label>Content:</label><textarea id="dashassist-seo-text" rows="6">' + currentText + '</textarea></div><div class="dashassist-form-group"><label>Focus Keyword (optional):</label><input type="text" id="dashassist-seo-keyword" placeholder="e.g., web design"></div><button type="button" class="dashassist-submit">Generate SEO</button><div class="dashassist-result"></div></div></div>');
        
        $('body').append($modal);
        
        $modal.find('.dashassist-close, .dashassist-modal').on('click', function(e) {
            if (e.target === this) {
                $modal.remove();
            }
        });
        
        $modal.find('.dashassist-submit').on('click', function() {
            var $btn = $(this);
            var $result = $modal.find('.dashassist-result');
            var content = $('#dashassist-seo-text').val();
            var keyword = $('#dashassist-seo-keyword').val();
            
            if (!content.trim()) {
                $result.html('<p class="dashassist-error">Please enter content.</p>');
                return;
            }
            
            if (typeof dashassistData === 'undefined') {
                $result.html('<p class="dashassist-error">DashAssist AI is not properly configured. Please check settings.</p>');
                $btn.prop('disabled', false).text('Generate SEO');
                return;
            }
            
            $btn.prop('disabled', true).text('Generating...');
            $result.html('<p class="dashassist-loading">Processing...</p>');
            
            $.ajax({
                url: dashassistData.ajaxurl,
                type: 'POST',
                data: {
                    action: 'dashassist_create_seo',
                    nonce: dashassistData.nonce,
                    content: content,
                    focus_keyword: keyword
                },
                success: function(response) {
                    if (response.success) {
                        $result.html('<div class="dashassist-success"><h3>SEO Title:</h3><textarea class="dashassist-output" rows="1" readonly>' + (response.data.title || '') + '</textarea><h3>Meta Description:</h3><textarea class="dashassist-output" rows="2" readonly>' + (response.data.description || '') + '</textarea><button type="button" class="dashassist-use-btn">Copy Both</button></div>');
                        $modal.find('.dashassist-use-btn').on('click', function() {
                            var title = response.data.title || '';
                            var desc = response.data.description || '';
                            var combined = 'Title: ' + title + '\n\nDescription: ' + desc;
                            var $temp = $('<textarea>').val(combined).appendTo('body');
                            $temp.select();
                            document.execCommand('copy');
                            $temp.remove();
                            $(this).text('Copied!').prop('disabled', true);
                            setTimeout(function() {
                                $modal.remove();
                            }, 1000);
                        });
                    } else {
                        $result.html('<p class="dashassist-error">' + (response.data.message || 'An error occurred') + '</p>');
                    }
                },
                error: function() {
                    $result.html('<p class="dashassist-error">Network error. Please try again.</p>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text('Generate SEO');
                }
            });
        });
    }
    
    function getEditorText($editor) {
        if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden()) {
            return tinyMCE.activeEditor.getContent({ format: 'text' });
        }
        return $editor.val() || $editor.text() || '';
    }
    
    function checkElementorAndInit() {
        if ($('#elementor-panel').length && typeof elementor !== 'undefined') {
            console.log('DashAssist: Initializing Elementor integration');
            initElementorIntegration();
        }
    }
    
    $(document).ready(function() {
        initDashAssistTools();
        checkElementorAndInit();
        
        setInterval(function() {
            if ($('#elementor-panel').length && typeof elementor !== 'undefined') {
                checkElementorAndInit();
            }
        }, 3000);
    });
    
    $(window).on('elementor:init', function() {
        setTimeout(function() {
            initDashAssistTools();
            checkElementorAndInit();
        }, 1000);
    });
    
    if (typeof elementor !== 'undefined' && elementor.hooks) {
        elementor.hooks.addAction('panel/open_editor/widget', function() {
            setTimeout(function() {
                checkElementorAndInit();
            }, 800);
        });
        
        elementor.hooks.addAction('panel/open_editor/global', function() {
            setTimeout(function() {
                checkElementorAndInit();
            }, 800);
        });
    }
    
})(typeof jQuery !== 'undefined' ? jQuery : window.jQuery || window.$);

