<?php
/**
 * Title: Footer Default ( Perfume Store FSE )
 * Slug: perfume-store-fse/footer
 * Categories: footer, fresh-blog-lite-patterns
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"metadata":{"name":"Footer"},"align":"full","className":"is-style-default","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default pscf-luxury-footer-wrapper" style="margin-top:0;margin-bottom:0">
  
  <!-- Main Footer Content -->
  <section class="pscf-luxury-footer-main">
    <div class="pscf-luxury-footer-grid">
      
      <!-- Column 1: Brand Story & Socials -->
      <div class="pscf-footer-col pscf-footer-brand-col">
        <h3 class="pscf-footer-brand-title"><?php echo esc_html( get_bloginfo('name') ); ?></h3>
        <p class="pscf-footer-story">
          <?php esc_html_e('The art of luxury perfumery. We curate and craft exceptional fragrances that capture emotions, spark memories, and inspire absolute elegance. Indulge in scents made with passion.', 'perfume-store-fse'); ?>
        </p>
        <div class="pscf-footer-socials">
          <a href="#" class="pscf-social-link">Instagram</a>
          <a href="#" class="pscf-social-link">Facebook</a>
          <a href="#" class="pscf-social-link">Pinterest</a>
        </div>
      </div>

      <!-- Column 2: Newsletter Signup -->
      <div class="pscf-footer-col pscf-footer-newsletter-col">
        <h4 class="pscf-footer-col-title"><?php esc_html_e('Newsletter', 'perfume-store-fse'); ?></h4>
        <p class="pscf-footer-newsletter-desc">
          <?php esc_html_e('Subscribe to receive early access to new collections and exclusive boutique offers.', 'perfume-store-fse'); ?>
        </p>
        <form class="pscf-footer-newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing.');">
          <input type="email" placeholder="<?php esc_attr_e('Enter your email address', 'perfume-store-fse'); ?>" required class="pscf-newsletter-input" />
          <button type="submit" class="pscf-newsletter-submit" aria-label="Subscribe">&#8594;</button>
        </form>
      </div>

      <!-- Column 3: Navigation Links -->
      <div class="pscf-footer-col pscf-footer-links-col">
        <h4 class="pscf-footer-col-title"><?php esc_html_e('Boutique', 'perfume-store-fse'); ?></h4>
        <ul class="pscf-footer-links-list">
          <li><a href="<?php echo esc_url(home_url('/shop/')); ?>"><?php esc_html_e('Belanja', 'perfume-store-fse'); ?></a></li>
          <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php esc_html_e('Keranjang', 'perfume-store-fse'); ?></a></li>
          <li><a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"><?php esc_html_e('Akun Saya', 'perfume-store-fse'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/#faq')); ?>"><?php esc_html_e('Tanya Jawab (FAQs)', 'perfume-store-fse'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/#why-choose')); ?>"><?php esc_html_e('Tentang Kami', 'perfume-store-fse'); ?></a></li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Bottom Footer Bar -->
  <div class="pscf-luxury-footer-bottom">
    <div class="pscf-luxury-footer-bottom-inner">
      <div class="pscf-footer-copyright">
        <?php
        printf(
          esc_html__( '&copy; %1$s %2$s. Handcrafted for perfume connoisseurs.', 'perfume-store-fse' ),
          esc_html( date_i18n( __( 'Y', 'perfume-store-fse' ) ) ),
          '<a href="' . esc_url( home_url('/') ) . '" class="pscf-footer-copyright-link">' . esc_html( get_bloginfo('name') ) . '</a>'
        );
        ?>
      </div>
      <div class="pscf-footer-payment-badges">
        <span class="pscf-payment-badge">Visa</span>
        <span class="pscf-payment-badge">Mastercard</span>
        <span class="pscf-payment-badge">PayPal</span>
        <span class="pscf-payment-badge">Secure Checkout</span>
      </div>
    </div>
  </div>

</div>
<!-- /wp:group -->
