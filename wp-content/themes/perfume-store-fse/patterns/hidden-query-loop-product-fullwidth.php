<?php

/**
 * Title: Hidden Product Query Loop, Fullwidth
 * Slug: perfume-store-fse/hidden-query-loop-product-fullwidth
 * Inserter: no
 */
?>
<!-- wp:group {"metadata":{"name":"Main QL"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":[],"isProductCollectionBlock":true,"perPage":10,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"align":"wide"} -->
  <div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:woocommerce/product-template -->
    <!-- wp:group {"className":"is-style-section-1","style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
    <div class="wp-block-group is-style-section-1" style="min-height:100%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
      <div class="wp-block-group"><!-- wp:group {"className":"is-style-section-2","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfQueryLoop":true,"style":{"dimensions":{"aspectRatio":"3/4"}}} -->
          <!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"right","className":"is-style-woo-product-sale-badge-2"} /-->
          <!-- /wp:woocommerce/product-image -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32","right":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4"}},"layout":{"type":"constrained"}} -->
          <div class="wp-block-group"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textColor":"primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

            <!-- wp:post-title {"isLink":true,"className":"is-style-text-label-2","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|32","left":"var:preset|spacing|32","right":"var:preset|spacing|32"},"blockGap":"var:preset|spacing|16"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
      <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"className":"is-style-woo-product-button ac-right-sb","fontSize":"minute"} /--></div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:woocommerce/product-template -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:woocommerce/product-collection-no-results -->
    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
      <p class="has-medium-font-size"><?php /* Translators: 1. is the start of a 'strong' HTML element, 2. is the end of a 'strong' HTML element */
                                      echo sprintf(esc_html__('%1$sNo results found%2$s', 'perfume-store-fse'), '<strong>', '</strong>'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p><?php /* Translators: 1. is the start of a 'a' HTML element, 2. is the end of a 'a' HTML element, 3. is the start of a 'a' HTML element, 4. is the end of a 'a' HTML element */
          echo sprintf(esc_html__('You can try %1$sclearing any filters%2$s or head to our %3$sstore\'s home%4$s', 'perfume-store-fse'), '<a class="wc-link-clear-any-filters" href="' . esc_url('#') . '">', '</a>', '<a class="wc-link-stores-home" href="' . esc_url('#') . '">', '</a>'); ?></p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:woocommerce/product-collection-no-results -->
  </div>
  <!-- /wp:woocommerce/product-collection -->

  <!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
  <div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
  <!-- /wp:spacer -->
</div>
<!-- /wp:group -->
