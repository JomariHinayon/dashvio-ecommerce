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

<?php wp_footer(); ?>
</body>
</html>

