<?php
/**
 * Footer: footer columns, mobile bottom bar, scroll-to-top.
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

get_template_part('template-parts/footer', 'main');
get_template_part('template-parts/mobile', 'bar');
get_template_part('template-parts/scroll', 'top');

wp_footer();
?>
</body>
</html>
