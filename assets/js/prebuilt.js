(function($) {
    'use strict';
    
    $(document).ready(function() {
        $('#dashvio-demo-search').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            filterDemos(searchTerm);
        });
    });
    
    function filterDemos(searchTerm) {
        $('.dashvio-prebuilt-demo').each(function() {
            var $demo = $(this);
            var demoName = $demo.find('.dashvio-prebuilt-demo-name').text().toLowerCase();
            var demoDescription = $demo.find('.dashvio-prebuilt-demo-description').text().toLowerCase();
            
            if (demoName.indexOf(searchTerm) !== -1 || demoDescription.indexOf(searchTerm) !== -1) {
                $demo.show();
            } else {
                $demo.hide();
            }
        });
    }
    
    function showModal(modalId) {
        $('#' + modalId).addClass('active');
        $('body').css('overflow', 'hidden');
    }
    
    function hideModal(modalId) {
        $('#' + modalId).removeClass('active');
        $('body').css('overflow', '');
    }
    
    function showImportConfirm(demoName, callback) {
        var $modal = $('#dashvio-import-modal');
        $modal.find('.dashvio-modal-message').text('Import "' + demoName + '" demo? This will create WordPress pages with Elementor content.');
        $modal.find('.dashvio-modal-pages').hide();
        
        $modal.find('.dashvio-modal-btn--confirm').off('click').on('click', function() {
            hideModal('dashvio-import-modal');
            if (callback) callback();
        });
        
        showModal('dashvio-import-modal');
    }
    
    function showSuccessModal(message, pages, editUrl) {
        var $modal = $('#dashvio-success-modal');
        $modal.find('.dashvio-modal-message').text(message);
        
        var $pagesList = $modal.find('.dashvio-modal-pages-list');
        $pagesList.empty();
        
        if (pages && pages.length > 0) {
            pages.forEach(function(page) {
                $pagesList.append('<li>' + page + '</li>');
            });
            $modal.find('.dashvio-modal-pages').show();
        } else {
            $modal.find('.dashvio-modal-pages').hide();
        }
        
        $modal.find('.dashvio-modal-btn--edit').off('click').on('click', function() {
            if (editUrl) {
                window.location.href = editUrl;
            }
        });
        
        showModal('dashvio-success-modal');
    }
    
    function showErrorModal(message) {
        var $modal = $('#dashvio-error-modal');
        $modal.find('.dashvio-modal-message').text(message);
        showModal('dashvio-error-modal');
    }
    
    $('.dashvio-modal-close, .dashvio-modal-btn--close, .dashvio-modal-btn--cancel').on('click', function() {
        var $modal = $(this).closest('.dashvio-modal');
        hideModal($modal.attr('id'));
    });
    
    $('.dashvio-modal-overlay').on('click', function() {
        var $modal = $(this).closest('.dashvio-modal');
        hideModal($modal.attr('id'));
    });
    
    $('.dashvio-prebuilt-btn--use-template').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var demoId = $btn.data('demo-id');
        var demoName = $btn.data('demo-name');
        var hasPurchased = $btn.data('has-purchased') === 1 || $btn.data('has-purchased') === '1';
        
        if (!demoId) {
            showErrorModal('Demo ID is missing.');
            return;
        }
        
        if (!hasPurchased) {
            var $quickViewBtn = $('.dashvio-quick-view-btn[data-demo-id="' + demoId + '"]');
            if ($quickViewBtn.length) {
                $quickViewBtn.trigger('click');
            } else {
                showErrorModal('Quick View not available for this template.');
            }
            return;
        }
        showImportConfirm(demoName, function() {
            $btn.prop('disabled', true).text('Importing...');
            
            $.ajax({
                url: dashvioPrebuilt.ajaxurl,
                type: 'POST',
                data: {
                    action: 'dashvio_import_demo',
                    demo_id: demoId,
                    nonce: dashvioPrebuilt.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $btn.text('Imported').prop('disabled', true);
                        showSuccessModal(
                            'Demo imported successfully!',
                            response.data.pages,
                            response.data.edit_url
                        );
                    } else {
                        showErrorModal('Error: ' + (response.data || 'Unknown error'));
                        $btn.prop('disabled', false).text('Use this Template');
                    }
                },
                error: function() {
                    showErrorModal('Network error. Please try again.');
                    $btn.prop('disabled', false).text('Use this Template');
                }
            });
        });
    });
    
    $('.dashvio-prebuilt-btn--import:not(.dashvio-prebuilt-btn--use-template)').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var demoId = $btn.data('demo-id');
        var demoName = $btn.data('demo-name');
        var originalText = $btn.text();
        
        if (!demoId) {
            showErrorModal('Demo ID is missing.');
            return;
        }
        
        showImportConfirm(demoName, function() {
            $btn.prop('disabled', true).text('Importing...');
            
            $.ajax({
                url: dashvioPrebuilt.ajaxurl,
                type: 'POST',
                data: {
                    action: 'dashvio_import_demo',
                    demo_id: demoId,
                    nonce: dashvioPrebuilt.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $btn.text('Imported').prop('disabled', true);
                        showSuccessModal(
                            'Demo imported successfully!',
                            response.data.pages,
                            response.data.edit_url
                        );
                    } else {
                        showErrorModal('Error: ' + (response.data || 'Unknown error'));
                        $btn.prop('disabled', false).text(originalText);
                    }
                },
                error: function() {
                    showErrorModal('Network error. Please try again.');
                    $btn.prop('disabled', false).text(originalText);
                }
            });
        });
    });
    
    function isMobile() {
        return window.innerWidth <= 768;
    }
    
    $(document).on('click', '.dashvio-prebuilt-demo-thumbnail', function(e) {
        if (isMobile()) {
            e.preventDefault();
            e.stopPropagation();
            
            var $demo = $(this).closest('.dashvio-prebuilt-demo');
            var $overlay = $demo.find('.dashvio-prebuilt-demo-overlay');
            
            if ($overlay.hasClass('mobile-active')) {
                $overlay.removeClass('mobile-active');
            } else {
                $('.dashvio-prebuilt-demo-overlay').removeClass('mobile-active');
                $overlay.addClass('mobile-active');
            }
        }
    });
    
    $(document).on('click', function(e) {
        if (isMobile()) {
            if (!$(e.target).closest('.dashvio-prebuilt-demo-thumbnail').length) {
                $('.dashvio-prebuilt-demo-overlay').removeClass('mobile-active');
            }
        }
    });
    
    $(document).on('click', '.dashvio-prebuilt-demo-overlay', function(e) {
        if (isMobile()) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
    
    $(document).on('click', '.dashvio-prebuilt-import-text', function(e) {
        if (isMobile()) {
            e.stopPropagation();
            var $overlay = $(this).closest('.dashvio-prebuilt-demo-overlay');
            var href = $overlay.attr('href');
            if (href) {
                window.open(href, '_blank');
            }
        }
    });
    
})(jQuery);

