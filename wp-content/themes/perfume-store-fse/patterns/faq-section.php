<?php
/**
 * Title: FAQ Section
 * Slug: perfume-store-fse/faq-section
 * Categories: text, fresh-blog-lite-patterns
 */

$faqs_query = new WP_Query(array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'ASC',
    'orderby' => 'date'
));
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"FAQ Section"},"align":"full","className":"pscf-luxury-faq-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section id="faq" class="wp-block-group alignfull pscf-luxury-faq-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">
  <div class="pscf-luxury-faq-container">
    <div class="pscf-luxury-faq-header">
      <span class="pscf-luxury-faq-kicker"><?php esc_html_e('Pertanyaan Umum', 'perfume-store-fse'); ?></span>
      <h2 class="pscf-luxury-faq-title"><?php esc_html_e('Frequently Asked Questions', 'perfume-store-fse'); ?></h2>
      <div class="pscf-luxury-faq-divider"></div>
    </div>
    
    <div class="pscf-luxury-faq-accordion">
      <?php if ( $faqs_query->have_posts() ) : ?>
        <?php while ( $faqs_query->have_posts() ) : $faqs_query->the_post(); ?>
          <div class="pscf-faq-item">
            <button class="pscf-faq-trigger">
              <span class="pscf-faq-question"><?php the_title(); ?></span>
              <span class="pscf-faq-icon-indicator"></span>
            </button>
            <div class="pscf-faq-content">
              <div class="pscf-faq-content-inner">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <p style="text-align: center; color: #7a6e65; font-family: Georgia, serif; font-style: italic;"><?php esc_html_e('Belum ada pertanyaan FAQ yang dipublikasikan.', 'perfume-store-custom-features'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- /wp:group -->
