<?php

/**
 * Title: Hidden Single Product
 * Slug: perfume-store-fse/hidden-single-product
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|52","margin":{"top":"var:preset|spacing|52","bottom":"var:preset|spacing|52"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--52);margin-bottom:var(--wp--preset--spacing--52)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"constrained"}} -->
  <div class="wp-block-group alignwide"><!-- wp:woocommerce/breadcrumbs {"fontSize":"minute"} /-->

    <!-- wp:woocommerce/store-notices /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:columns {"align":"wide"} -->
  <div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
    <div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"className":"is-style-section-2","style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24","left":"var:preset|spacing|24","right":"var:preset|spacing|24"}}},"layout":{"type":"constrained"}} -->
      <div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--24);padding-right:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24);padding-left:var(--wp--preset--spacing--24)"><!-- wp:woocommerce/product-image-gallery {"align":"wide","className":"is-style-woo-product-image-gallery-1"} /--></div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:group {"className":"is-style-section-2","style":{"position":{"type":"sticky","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32","left":"var:preset|spacing|32","right":"var:preset|spacing|32"}}},"layout":{"type":"default"}} -->
      <div class="wp-block-group is-style-section-2" style="padding-top:var(--wp--preset--spacing--32);padding-right:var(--wp--preset--spacing--32);padding-bottom:var(--wp--preset--spacing--32);padding-left:var(--wp--preset--spacing--32)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|24"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|8"}},"layout":{"type":"default"}} -->
          <div class="wp-block-group">
            <!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true,"className":"is-style-default"} /-->
            <!-- wp:post-title {"textAlign":"","level":1,"className":"is-style-default","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->
          </div>
          <!-- /wp:group -->

          <!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"className":"is-style-text-label","textColor":"primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|16"}},"layout":{"type":"default"}} -->
        <div class="wp-block-group">
          <!-- wp:woocommerce/product-summary {"isDescendentOfSingleProductTemplate":true,"className":"is-style-default"} /-->
          <!-- wp:woocommerce/add-to-cart-with-options {"className":"is-style-woo-add-to-cart-with-options-1"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:woocommerce/product-meta {"metadata":{"ignoredHookedBlocks":["core/post-terms"]}} -->
        <div class="wp-block-woocommerce-product-meta"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
          <div class="wp-block-group"><!-- wp:woocommerce/product-sku /-->

            <!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->

            <!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /-->
          </div>
          <!-- /wp:group -->

          <!-- wp:post-terms {"term":"product_brand","prefix":"Brands: "} /-->
        </div>
        <!-- /wp:woocommerce/product-meta -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

  <!-- wp:woocommerce/product-details {"className":"is-style-minimal"} -->
  <div class="wp-block-woocommerce-product-details alignwide is-style-minimal">
    <!-- wp:woocommerce/accordion-group {"metadata":{"isDescendantOfProductDetails":true}} -->
    <div class="wp-block-woocommerce-accordion-group">
      <!-- wp:woocommerce/accordion-item {"openByDefault":true} -->
      <div class="is-open wp-block-woocommerce-accordion-item">
        <!-- wp:woocommerce/accordion-header {"className":"is-style-text-label","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}},"backgroundColor":"light"} -->
        <h3 class="wp-block-woocommerce-accordion-header is-style-text-label has-light-background-color has-background accordion-item__heading"><button class="accordion-item__toggle" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><span>Description</span><span class="accordion-item__toggle-icon has-icon-plus" style="width:1.2em;height:1.2em"><svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M11 12.5V17.5H12.5V12.5H17.5V11H12.5V6H11V11H6V12.5H11Z" fill="currentColor"></path>
              </svg></span></button></h3>
        <!-- /wp:woocommerce/accordion-header -->
        <!-- wp:woocommerce/accordion-panel {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}}} -->
        <div class="wp-block-woocommerce-accordion-panel">
          <div class="accordion-content__wrapper" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)">
            <!-- wp:woocommerce/product-description {"className":"is-style-default"} /-->
          </div>
        </div>
        <!-- /wp:woocommerce/accordion-panel -->
      </div>
      <!-- /wp:woocommerce/accordion-item -->
      <!-- wp:woocommerce/accordion-item -->
      <div class="wp-block-woocommerce-accordion-item">
        <!-- wp:woocommerce/accordion-header {"className":"is-style-text-label","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}},"backgroundColor":"light"} -->
        <h3 class="wp-block-woocommerce-accordion-header is-style-text-label has-light-background-color has-background accordion-item__heading"><button class="accordion-item__toggle" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><span>Additional Information</span><span class="accordion-item__toggle-icon has-icon-plus" style="width:1.2em;height:1.2em"><svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M11 12.5V17.5H12.5V12.5H17.5V11H12.5V6H11V11H6V12.5H11Z" fill="currentColor"></path>
              </svg></span></button></h3>
        <!-- /wp:woocommerce/accordion-header -->
        <!-- wp:woocommerce/accordion-panel {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}}} -->
        <div class="wp-block-woocommerce-accordion-panel">
          <div class="accordion-content__wrapper" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)">
            <!-- wp:woocommerce/product-specifications /-->
          </div>
        </div>
        <!-- /wp:woocommerce/accordion-panel -->
      </div>
      <!-- /wp:woocommerce/accordion-item -->
      <!-- wp:woocommerce/accordion-item -->
      <div class="wp-block-woocommerce-accordion-item">
        <!-- wp:woocommerce/accordion-header {"className":"is-style-text-label","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}},"backgroundColor":"light"} -->
        <h3 class="wp-block-woocommerce-accordion-header is-style-text-label has-light-background-color has-background accordion-item__heading"><button class="accordion-item__toggle" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><span>Reviews</span><span class="accordion-item__toggle-icon has-icon-plus" style="width:1.2em;height:1.2em"><svg width="1.2em" height="1.2em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M11 12.5V17.5H12.5V12.5H17.5V11H12.5V6H11V11H6V12.5H11Z" fill="currentColor"></path>
              </svg></span></button></h3>
        <!-- /wp:woocommerce/accordion-header -->
        <!-- wp:woocommerce/accordion-panel {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16","left":"var:preset|spacing|16","right":"var:preset|spacing|16"}}}} -->
        <div class="wp-block-woocommerce-accordion-panel">
          <div class="accordion-content__wrapper" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)">
            <!-- wp:woocommerce/product-reviews -->
            <div class="wp-block-woocommerce-product-reviews">
              <!-- wp:group {"layout":{"type":"default"}} -->
              <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"default"}} -->
                <div class="wp-block-group">
                  <!-- wp:woocommerce/product-reviews-title /-->
                  <!-- wp:woocommerce/product-review-template -->
                  <!-- wp:columns -->
                  <div class="wp-block-columns">
                    <!-- wp:column {"width":"40px"} -->
                    <div class="wp-block-column" style="flex-basis:40px">
                      <!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /-->
                    </div>
                    <!-- /wp:column -->
                    <!-- wp:column -->
                    <div class="wp-block-column">
                      <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                      <div class="wp-block-group">
                        <!-- wp:woocommerce/product-review-author-name /-->
                        <!-- wp:woocommerce/product-review-rating /-->
                      </div>
                      <!-- /wp:group -->
                      <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
                      <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px">
                        <!-- wp:woocommerce/product-review-date /-->
                      </div>
                      <!-- /wp:group -->
                      <!-- wp:woocommerce/product-review-content /-->
                    </div>
                    <!-- /wp:column -->
                  </div>
                  <!-- /wp:columns -->
                  <!-- /wp:woocommerce/product-review-template -->
                  <!-- wp:woocommerce/product-reviews-pagination -->
                  <!-- wp:woocommerce/product-reviews-pagination-previous /-->
                  <!-- wp:woocommerce/product-reviews-pagination-numbers /-->
                  <!-- wp:woocommerce/product-reviews-pagination-next /-->
                  <!-- /wp:woocommerce/product-reviews-pagination -->
                </div>
                <!-- /wp:group -->
                <!-- wp:woocommerce/product-review-form /-->
              </div>
              <!-- /wp:group -->
            </div>
            <!-- /wp:woocommerce/product-reviews -->
          </div>
        </div>
        <!-- /wp:woocommerce/accordion-panel -->
      </div>
      <!-- /wp:woocommerce/accordion-item -->
    </div>
    <!-- /wp:woocommerce/accordion-group -->
  </div>
  <!-- /wp:woocommerce/product-details -->

  <!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":4,"pages":"0","offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":true,"previewMessage":"Actual products will vary depending on the product being viewed."},"align":"wide","isGridResponsive":true,"gridLGCols":4} -->
  <div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:group {"className":"is-style-section-1","style":{"spacing":{"padding":{"left":"var:preset|spacing|16","right":"var:preset|spacing|16","top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group is-style-section-1" style="padding-top:var(--wp--preset--spacing--16);padding-right:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);padding-left:var(--wp--preset--spacing--16)"><!-- wp:heading {"className":"is-style-text-label"} -->
      <h2 class="wp-block-heading is-style-text-label"><?php esc_html_e('Related Products ', 'perfume-store-fse'); ?></h2>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:woocommerce/product-template -->
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
          <div class="wp-block-group"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"className":"is-style-default","textColor":"primary","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

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
  </div>
  <!-- /wp:woocommerce/product-collection -->
</section>
<!-- /wp:group -->

<!-- wp:spacer {"height":"1px","className":"is-style-spacer-none-up-lg","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|52"}}}} -->
<div style="margin-bottom:var(--wp--preset--spacing--52);height:1px" aria-hidden="true" class="wp-block-spacer is-style-spacer-none-up-lg"></div>
<!-- /wp:spacer -->
