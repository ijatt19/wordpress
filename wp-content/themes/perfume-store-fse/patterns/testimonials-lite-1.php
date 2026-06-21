<?php
/**
 * Title: Testimonials Lite 1
 * Slug: perfume-store-fse/testimonials-lite-1
 * Categories: reviews, fresh-blog-lite-patterns
 */

// Define testimonials array for easy maintenance and cleaner code
$testimonials = array(
    array(
        'rating'    => 5,
        'text'      => 'The fragrance I bought is long-lasting and sophisticated, and I’ve received compliments almost every single day.',
        'name'      => 'John Matthews',
        'role'      => 'Marketing Executive',
        'avatar'    => 'avatar-lite-1.webp'
    ),
    array(
        'rating'    => 5,
        'text'      => 'The perfume is simply enchanting, and I get endless compliments whenever I wear it, making every moment special.',
        'name'      => 'Sarah Walker',
        'role'      => 'Teacher',
        'avatar'    => 'avatar-lite-2.webp'
    ),
    array(
        'rating'    => 5,
        'text'      => 'The shopping experience was smooth, and the perfume truly exceeded all of my expectations, from packaging to lasting scent.',
        'name'      => 'Andrew Collins',
        'role'      => 'Software Engineer',
        'avatar'    => 'avatar-lite-6.webp'
    ),
    array(
        'rating'    => 5,
        'text'      => 'The fragrance is sweet yet refined, and it lasts gracefully all day, leaving behind a memorable impression.',
        'name'      => 'Emily Scott',
        'role'      => 'Fashion Blogger',
        'avatar'    => 'avatar-lite-3.webp'
    ),
    array(
        'rating'    => 5,
        'text'      => 'The perfumes here stand out from ordinary choices, delivering premium quality and lasting elegance in every spray.',
        'name'      => 'David Harris',
        'role'      => 'Fashion Photographer',
        'avatar'    => 'avatar-lite-4.webp'
    ),
    array(
        'rating'    => 5,
        'text'      => 'The fragrance perfectly captures femininity and strength, making it a scent I admire and deeply love.',
        'name'      => 'Jessica Lane',
        'role'      => 'Artist',
        'avatar'    => 'avatar-lite-5.webp'
    )
);
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Testimonials Lite"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section id="testimonials" class="wp-block-group alignfull is-style-default pscf-testimonials-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">
  <div class="wp-block-group alignwide pscf-testimonials-inner">
    <div class="wp-block-group alignwide" style="text-align: center; margin-bottom: 3.5em;">
      <span class="is-style-text-kicker-2" style="display:block; text-transform: uppercase; color: #b8860b; font-weight: 700; font-size: 0.85em; letter-spacing: 2px; margin-bottom: 8px;"><?php esc_html_e('Trusted By Many', 'perfume-store-fse'); ?></span>
      <h2 class="is-style-text-title-2" style="font-size: 2.2em; font-weight: 700; color: #2c2520; margin: 0;"><?php esc_html_e('Happy Clients', 'perfume-store-fse'); ?></h2>
    </div>

    <div class="pscf-testimonials-slider-wrapper">
      <button class="pscf-slider-arrow prev-arrow" aria-label="Previous Slide">⟨</button>
      
      <div class="pscf-testimonials-slider">
        <?php foreach ( $testimonials as $item ) : ?>
          <div class="pscf-testimonial-card">
            <div class="pscf-testimonial-rating">
              <?php echo str_repeat( '★', $item['rating'] ); ?>
            </div>
            <p class="pscf-testimonial-text">
              "<?php echo esc_html( $item['text'] ); ?>"
            </p>
            <div class="pscf-testimonial-author">
              <div class="pscf-testimonial-avatar">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/' . $item['avatar'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy" />
              </div>
              <div class="pscf-testimonial-meta">
                <h4 class="pscf-testimonial-name"><?php echo esc_html( $item['name'] ); ?></h4>
                <span class="pscf-testimonial-role"><?php echo esc_html( $item['role'] ); ?></span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <button class="pscf-slider-arrow next-arrow" aria-label="Next Slide">⟩</button>
    </div>
    
    <div class="pscf-slider-dots"></div>
  </div>
</section>
<!-- /wp:group -->
