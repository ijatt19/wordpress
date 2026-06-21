<?php
/**
 * Title: Hero Lite 1
 * Slug: perfume-store-fse/hero-lite-1
 * Categories: intro, call-to-action, fresh-blog-lite-patterns
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Hero Lite"},"align":"full","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-default pscf-hero-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--32)">
  <!-- wp:cover {"url":"<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/hero-lite-1.webp","dimRatio":40,"overlayColor":"black","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":1},"contentPosition":"bottom left","sizeSlug":"large","align":"wide","className":"aspect-xs-square","style":{"dimensions":{"aspectRatio":"19/9"},"spacing":{"padding":{"right":"var:preset|spacing|80","left":"var:preset|spacing|80","top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"},"coverXSAspectRatio":"3/4"} -->
  <div class="wp-block-cover alignwide has-custom-content-position is-position-bottom-left aspect-xs-square" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">
    <img class="wp-block-cover__image-background size-large" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/hero-lite-1.webp" style="object-position:50% 100%" data-object-fit="cover" data-object-position="50% 100%" />
    <span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span>
    
    <div class="wp-block-cover__inner-container">
      <!-- wp:group {"layout":{"type":"constrained"}} -->
      <div class="wp-block-group">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
          <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
          <div class="wp-block-group">
            <!-- wp:paragraph {"className":"is-style-text-kicker-2"} -->
            <p class="is-style-text-kicker-2"><?php esc_html_e('Luxury Fragrance Collection', 'perfume-store-fse'); ?></p>
            <!-- /wp:paragraph -->
          </div>
          <!-- /wp:group -->

          <!-- wp:heading {"className":"is-style-text-banner","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-50"}}}},"textColor":"secondary-50"} -->
          <h2 class="wp-block-heading is-style-text-banner has-secondary-50-color has-text-color has-link-color"><?php esc_html_e('Discover Your Signature Scent', 'perfume-store-fse'); ?></h2>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary-50"}}},"spacing":{"margin":{"top":"15px","bottom":"25px"}}},"textColor":"secondary-50"} -->
          <p class="has-secondary-50-color has-text-color has-link-color pscf-hero-description">
            <?php esc_html_e('Explore original perfumes and premium decants curated to match every personality, mood, and occasion.', 'perfume-store-fse'); ?>
          </p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"24px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="margin-top:24px">
          <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
          <div class="wp-block-buttons">
            <!-- wp:button {"className":"is-style-fill","style":{"border":{"radius":"30px"}}} -->
            <div class="wp-block-button is-style-fill">
              <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="wp-block-button__link wp-element-button">
                <?php esc_html_e('Shop Collection', 'perfume-store-fse'); ?>
              </a>
            </div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"30px"}}} -->
            <div class="wp-block-button is-style-outline">
              <a href="<?php echo esc_url(home_url('/#faq')); ?>" class="wp-block-button__link wp-element-button">
                <?php esc_html_e('Find Your Fragrance', 'perfume-store-fse'); ?>
              </a>
            </div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
  </div>
  <!-- /wp:cover -->
</section>
<!-- /wp:group -->
