<?php

/**
 * Title: Hidden Cart
 * Slug: perfume-store-fse/hidden-cart
 * Inserter: no
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/page-header-lite-1.webp","dimRatio":60,"overlayColor":"light","isUserOverlayColor":true,"isDark":false,"sizeSlug":"large","style":{"dimensions":{"aspectRatio":"auto"},"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32","right":"var:preset|spacing|32"},"margin":{"bottom":"var:preset|spacing|52"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light" style="margin-bottom:var(--wp--preset--spacing--52);padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><img class="wp-block-cover__image-background size-large" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/page-header-lite-1.webp" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-light-background-color has-background-dim-60 has-background-dim"></span>
  <div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
    <div class="wp-block-group"><!-- wp:post-title {"level":1,"align":"wide"} /--></div>
    <!-- /wp:group -->
  </div>
</div>
<!-- /wp:cover -->

<!-- wp:woocommerce/store-notices /-->

<!-- wp:woocommerce/cart {"className":"is-style-woo-cart-2"} -->
<div class="wp-block-woocommerce-cart alignwide is-loading is-style-woo-cart-2"><!-- wp:woocommerce/filled-cart-block -->
  <div class="wp-block-woocommerce-filled-cart-block"><!-- wp:woocommerce/cart-items-block -->
    <div class="wp-block-woocommerce-cart-items-block"><!-- wp:woocommerce/cart-line-items-block -->
      <div class="wp-block-woocommerce-cart-line-items-block"></div>
      <!-- /wp:woocommerce/cart-line-items-block -->

      <!-- wp:woocommerce/cart-cross-sells-block -->
      <div class="wp-block-woocommerce-cart-cross-sells-block"><!-- wp:heading {"fontSize":"large"} -->
        <h2 class="wp-block-heading has-large-font-size"><?php esc_html_e('You may be interested in…', 'perfume-store-fse'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:woocommerce/cart-cross-sells-products-block -->
        <div class="wp-block-woocommerce-cart-cross-sells-products-block"></div>
        <!-- /wp:woocommerce/cart-cross-sells-products-block -->
      </div>
      <!-- /wp:woocommerce/cart-cross-sells-block -->
    </div>
    <!-- /wp:woocommerce/cart-items-block -->

    <!-- wp:woocommerce/cart-totals-block -->
    <div class="wp-block-woocommerce-cart-totals-block"><!-- wp:woocommerce/cart-order-summary-block -->
      <div class="wp-block-woocommerce-cart-order-summary-block"><!-- wp:woocommerce/cart-order-summary-heading-block -->
        <div class="wp-block-woocommerce-cart-order-summary-heading-block"></div>
        <!-- /wp:woocommerce/cart-order-summary-heading-block -->

        <!-- wp:woocommerce/cart-order-summary-coupon-form-block -->
        <div class="wp-block-woocommerce-cart-order-summary-coupon-form-block"></div>
        <!-- /wp:woocommerce/cart-order-summary-coupon-form-block -->

        <!-- wp:woocommerce/cart-order-summary-totals-block -->
        <div class="wp-block-woocommerce-cart-order-summary-totals-block"><!-- wp:woocommerce/cart-order-summary-subtotal-block -->
          <div class="wp-block-woocommerce-cart-order-summary-subtotal-block"></div>
          <!-- /wp:woocommerce/cart-order-summary-subtotal-block -->

          <!-- wp:woocommerce/cart-order-summary-fee-block -->
          <div class="wp-block-woocommerce-cart-order-summary-fee-block"></div>
          <!-- /wp:woocommerce/cart-order-summary-fee-block -->

          <!-- wp:woocommerce/cart-order-summary-discount-block -->
          <div class="wp-block-woocommerce-cart-order-summary-discount-block"></div>
          <!-- /wp:woocommerce/cart-order-summary-discount-block -->

          <!-- wp:woocommerce/cart-order-summary-shipping-block -->
          <div class="wp-block-woocommerce-cart-order-summary-shipping-block"></div>
          <!-- /wp:woocommerce/cart-order-summary-shipping-block -->

          <!-- wp:woocommerce/cart-order-summary-taxes-block -->
          <div class="wp-block-woocommerce-cart-order-summary-taxes-block"></div>
          <!-- /wp:woocommerce/cart-order-summary-taxes-block -->
        </div>
        <!-- /wp:woocommerce/cart-order-summary-totals-block -->
      </div>
      <!-- /wp:woocommerce/cart-order-summary-block -->

      <!-- wp:woocommerce/cart-express-payment-block -->
      <div class="wp-block-woocommerce-cart-express-payment-block"></div>
      <!-- /wp:woocommerce/cart-express-payment-block -->

      <!-- wp:woocommerce/proceed-to-checkout-block -->
      <div class="wp-block-woocommerce-proceed-to-checkout-block"></div>
      <!-- /wp:woocommerce/proceed-to-checkout-block -->

      <!-- wp:woocommerce/cart-accepted-payment-methods-block -->
      <div class="wp-block-woocommerce-cart-accepted-payment-methods-block"></div>
      <!-- /wp:woocommerce/cart-accepted-payment-methods-block -->
    </div>
    <!-- /wp:woocommerce/cart-totals-block -->
  </div>
  <!-- /wp:woocommerce/filled-cart-block -->

  <!-- wp:woocommerce/empty-cart-block -->
  <div class="wp-block-woocommerce-empty-cart-block"><!-- wp:heading {"textAlign":"center","className":"with-empty-cart-icon wc-block-cart__empty-cart__title"} -->
    <h2 class="wp-block-heading has-text-align-center with-empty-cart-icon wc-block-cart__empty-cart__title"><?php esc_html_e('Your cart is currently empty!', 'perfume-store-fse'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots" />
    <!-- /wp:separator -->

    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('New in store', 'perfume-store-fse'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:woocommerce/product-new {"columns":4,"rows":1} /-->
  </div>
  <!-- /wp:woocommerce/empty-cart-block -->
</div>
<!-- /wp:woocommerce/cart -->

<!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
<div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
<!-- /wp:spacer -->
