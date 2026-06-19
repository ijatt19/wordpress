<?php

/**
 * Title: Header Default ( Perfume Store FSE )
 * Slug: perfume-store-fse/header
 * Categories: header, fresh-blog-lite-patterns
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header"},"align":"full","className":"is-style-default","style":{"border":{"bottom":{"color":"var:preset|color|secondary-100","width":"1px"},"top":[],"right":[],"left":[]},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default" style="border-bottom-color:var(--wp--preset--color--secondary-100);border-bottom-width:1px"><!-- wp:group {"className":"is-style-section-4","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","bottom":"var:preset|spacing|8"}}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group is-style-section-4" style="padding-top:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"nowrap"},"rowXSJustification":"center","rowSMJustification":"flex-start","rowXSFlexBasis":"100%"} -->
      <div class="wp-block-group alignwide"><!-- wp:social-links {"size":"has-small-icon-size","className":"is-style-sm-aware-1 is-style-social-links-1","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|12"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <ul class="wp-block-social-links has-small-icon-size is-style-sm-aware-1 is-style-social-links-1"><!-- wp:social-link {"url":"#!","service":"x"} /-->

          <!-- wp:social-link {"url":"#!","service":"facebook","label":""} /-->

          <!-- wp:social-link {"url":"#!","service":"instagram"} /-->
        </ul>
        <!-- /wp:social-links -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"},"rowXSJustification":"center","rowSMJustification":"flex-start","rowXSFlexBasis":"100%"} -->
      <div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"},"typography":{"lineHeight":"1"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="line-height:1"><!-- wp:image {"width":"18px","sizeSlug":"full","linkDestination":"none","className":"is-style-icon-aware-1"} -->
          <figure class="wp-block-image size-full is-resized is-style-icon-aware-1"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/icons/phone-light.webp" alt="" style="width:18px" /></figure>
          <!-- /wp:image -->

          <!-- wp:paragraph {"className":"is-style-text-aware-1 is-style-text-note","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
          <p class="is-style-text-aware-1 is-style-text-note has-base-color has-text-color has-link-color"><?php esc_html_e('+1 561 555 0786', 'perfume-store-fse'); ?></p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->

  <!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32)"><!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"},"layout":{"selfStretch":"fixed","flexSize":"150px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"rowXSJustification":"center"} -->
      <div class="wp-block-group"><!-- wp:site-logo {"width":28,"shouldSyncIcon":false,"style":{"color":{"duotone":"var:preset|duotone|primary-and-base"}}} /-->

        <!-- wp:site-title {"level":0,"className":"is-style-text-label"} /-->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
      <div class="wp-block-group"><!-- wp:navigation {"metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"is-style-navigation-basic nav-xs-hide nav-sm-hide nav-md-hide"} -->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Home', 'perfume-store-fse'); ?>","url":"<?php echo esc_url(home_url('/')); ?>","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('News', 'perfume-store-fse'); ?>","url":"#!","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Events', 'perfume-store-fse'); ?>","url":"#!","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('About', 'perfume-store-fse'); ?>","url":"#!","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Services', 'perfume-store-fse'); ?>","url":"#!","kind":"custom"} /-->
        <!-- /wp:navigation -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"},"typography":{"lineHeight":"1"},"layout":{"selfStretch":"fixed","flexSize":"150px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
      <div class="wp-block-group" style="line-height:1"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
        <div class="wp-block-buttons"><!-- wp:button -->
          <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Contact', 'perfume-store-fse'); ?></a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
