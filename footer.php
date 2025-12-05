<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo esc_html(date('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Quick View Modal -->
<div class="dashvio-quick-view-modal" id="dashvio-quick-view-modal" aria-hidden="true">
    <div class="dashvio-quick-view-overlay"></div>
    <div class="dashvio-quick-view-content">
        <button type="button" class="dashvio-quick-view-close" aria-label="<?php esc_attr_e('Close', 'dashvio'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="dashvio-quick-view-loader">
            <div class="dashvio-spinner"></div>
            <p><?php esc_html_e('Loading...', 'dashvio'); ?></p>
        </div>
        <div class="dashvio-quick-view-body" style="display: none;">
            <!-- Content will be loaded via AJAX -->
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>

