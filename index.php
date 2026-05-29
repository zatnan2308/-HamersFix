<?php
/**
 * Generic fallback template (pages, posts, and `service` until
 * single-service.php ships).
 * @package HamersFix
 */
if (!defined('ABSPATH')) exit;

get_header();
?>
<main id="main">
  <section class="s">
    <div class="s__body">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1 class="t-display-m" style="margin:0 0 24px"><?php the_title(); ?></h1>
          <?php if (has_post_thumbnail()) : ?>
            <div style="margin:0 0 24px;border-radius:var(--r-lg);overflow:hidden"><?php the_post_thumbnail('large', ['style' => 'width:100%;height:auto;display:block']); ?></div>
          <?php endif; ?>
          <div class="t-body"><?php the_content(); ?></div>
        </article>
      <?php endwhile; else : ?>
        <h1 class="t-display-m"><?php esc_html_e('Nothing here yet', 'hamersfix'); ?></h1>
        <p class="t-muted"><?php esc_html_e('Try the homepage, or give us a call.', 'hamersfix'); ?></p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php
get_footer();
