<?php

/**
 * Title: Header WooCommerce ( Perfume Store FSE )
 * Slug: perfume-store-fse/header-woo
 * Categories: header, fresh-blog-lite-patterns
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"metadata":{"name":"Header"},"align":"full","className":"is-style-default","style":{"border":{"bottom":{"color":"var:preset|color|secondary-100","width":"1px"},"top":[],"right":[],"left":[]},"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default" style="border-bottom-color:var(--wp--preset--color--secondary-100);border-bottom-width:1px">

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
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Shop', 'perfume-store-fse'); ?>","url":"<?php echo esc_url(home_url('/shop/')); ?>","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('About', 'perfume-store-fse'); ?>","url":"<?php echo esc_url(home_url('/tentang-kami/')); ?>","kind":"custom"} /-->
        <!-- wp:navigation-link {"label":"<?php esc_html_e('Services', 'perfume-store-fse'); ?>","url":"<?php echo esc_url(home_url('/layanan/')); ?>","kind":"custom"} /-->
        <!-- /wp:navigation -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"},"typography":{"lineHeight":"1"},"layout":{"selfStretch":"fixed","flexSize":"150px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
      <div class="wp-block-group" style="line-height:1"><!-- wp:woocommerce/mini-cart {"cartAndCheckoutRenderStyle":"removed"} /--></div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
