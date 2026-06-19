<?php

// Exit if accessed directly.
if (! defined('ABSPATH')) {
  exit;
}

// Essential Links
$pro_url = "https://designorbital.com/wordpress-theme/modern-personal-blog-wordpress-theme-fresh-blog-pro/";
?>

<div class="notice notice-info is-dismissible fresh-blog-lite-notice">
  <h2><?php esc_html_e('Fresh Blog Pro', 'fresh-blog-lite'); ?></h2>
  <p><?php esc_html_e('Use the discount code WPLOVE to upgrade to the Pro version today! The Pro version includes 150+ pre-designed patterns and 25+ powerful blocks & extensions.', 'fresh-blog-lite'); ?></p>
  <p>
    <a href="<?php echo esc_url($pro_url); ?>" class="button button-primary" target="_blank">
      <?php esc_html_e('Fresh Blog Pro', 'fresh-blog-lite'); ?>
    </a>
    <a href="<?php echo esc_url(admin_url('themes.php?page=fresh-blog-lite-page')); ?>" class="button button-secondary">
      <?php esc_html_e('Theme Info', 'fresh-blog-lite'); ?>
    </a>
  </p>
</div>
