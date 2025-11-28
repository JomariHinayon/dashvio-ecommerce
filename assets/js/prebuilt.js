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
    
    $('.dashvio-prebuilt-btn--import').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var demoId = $btn.data('demo-id');
        var demoName = $btn.data('demo-name');
        
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
                        $btn.prop('disabled', false).text('Import Demo');
                    }
                },
                error: function() {
                    showErrorModal('Network error. Please try again.');
                    $btn.prop('disabled', false).text('Import Demo');
                }
            });
        });
    });
    
})(jQuery);

