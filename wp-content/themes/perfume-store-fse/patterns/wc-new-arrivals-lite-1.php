<?php
/**
 * Title: WC New Arrivals Lite 1
 * Slug: perfume-store-fse/wc-new-arrivals-lite-1
 * Categories: woo-commerce, fresh-blog-lite-patterns
 */

// Define the 5 branded product IDs
$branded_ids = array(131, 126, 122, 46, 116);
$brands = array(
    131 => 'DIOR',
    126 => 'YSL',
    122 => 'HMNS',
    46  => 'NISHANE',
    116 => 'LOCAL BEST'
);
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"WC New Arrivals Lite"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull is-style-default pscf-luxury-products-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
  <div class="pscf-luxury-container">
    <div class="pscf-luxury-section-header">
      <span class="pscf-luxury-kicker"><?php esc_html_e('Koleksi Terkurasi', 'perfume-store-fse'); ?></span>
      <h2 class="pscf-luxury-title"><?php esc_html_e('Signature Branded Collection', 'perfume-store-fse'); ?></h2>
      <div class="pscf-luxury-header-divider"></div>
    </div>

    <div class="pscf-luxury-products-grid">
      <?php
      if ( class_exists( 'WooCommerce' ) ) {
          foreach ( $branded_ids as $product_id ) {
              $product = wc_get_product( $product_id );
              if ( ! $product ) {
                  continue;
              }
              
              $brand_label = isset( $brands[$product_id] ) ? $brands[$product_id] : 'PREMIUM';
              $product_name = $product->get_name();
              $product_price_html = $product->get_price_html();
              
              // Get product attachment image
              $product_image = wp_get_attachment_image_src( $product->get_image_id(), 'large' );
              $image_url = $product_image ? $product_image[0] : wc_placeholder_img_src();
              
              $add_to_cart_url = $product->add_to_cart_url();
              $add_to_cart_text = $product->add_to_cart_text();
              $product_permalink = get_permalink( $product_id );
              
              // Get average rating
              $rating_html = '';
              if ( wc_review_ratings_enabled() ) {
                  $average = $product->get_average_rating();
                  if ( $average > 0 ) {
                      $rating_html = '<div class="pscf-luxury-rating" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'woocommerce' ), $average ) . '">';
                      $rating_html .= str_repeat( '<span class="star">★</span>', round($average) );
                      $rating_html .= str_repeat( '<span class="star empty">★</span>', 5 - round($average) );
                      $rating_html .= '</div>';
                  } else {
                      // Default luxury stars for aesthetic alignment
                      $rating_html = '<div class="pscf-luxury-rating">';
                      $rating_html .= str_repeat( '<span class="star">★</span>', 5 );
                      $rating_html .= '</div>';
                  }
              }
              ?>
              <div class="pscf-luxury-product-card">
                <div class="pscf-luxury-product-badge"><?php echo esc_html( $brand_label ); ?></div>
                <div class="pscf-luxury-image-container">
                  <a href="<?php echo esc_url( $product_permalink ); ?>">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product_name ); ?>" loading="lazy" />
                  </a>
                </div>
                <div class="pscf-luxury-details">
                  <?php echo $rating_html; ?>
                  <h3 class="pscf-luxury-product-title">
                    <a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo esc_html( $product_name ); ?></a>
                  </h3>
                  <div class="pscf-luxury-product-price">
                    <?php echo $product_price_html; ?>
                  </div>
                  <div class="pscf-luxury-button-container">
                    <a href="<?php echo esc_url( $add_to_cart_url ); ?>" data-quantity="1" class="pscf-luxury-add-to-cart-button" data-product_id="<?php echo esc_attr( $product_id ); ?>" rel="nofollow">
                      <?php echo esc_html( $add_to_cart_text ); ?>
                    </a>
                  </div>
                </div>
              </div>
              <?php
          }
      } else {
          echo '<p style="text-align:center;">WooCommerce is not active.</p>';
      }
      ?>
    </div>
  </div>
</section>
<!-- /wp:group -->
