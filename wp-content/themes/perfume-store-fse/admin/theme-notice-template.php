<?php

// Exit if accessed directly.
if (! defined('ABSPATH')) {
  exit;
}

// Essential Links
$pro_url = "https://designorbital.com/wordpress-theme/fragrance-shop-wordpress-theme-perfume-store-fse-pro/";
?>

<div class="notice notice-info is-dismissible perfume-store-fse-notice">
  <h2><?php esc_html_e('Perfume Store FSE Pro', 'perfume-store-fse'); ?></h2>
  <p><?php esc_html_e('Use the discount code WPLOVE to upgrade to the Pro version today! The Pro version includes 150+ pre-designed patterns and 25+ powerful blocks & extensions.', 'perfume-store-fse'); ?></p>
  <p>
    <a href="<?php echo esc_url($pro_url); ?>" class="button button-primary" target="_blank">
      <?php esc_html_e('Perfume Store FSE Pro', 'perfume-store-fse'); ?>
    </a>
    <a href="<?php echo esc_url(admin_url('themes.php?page=perfume-store-fse-page')); ?>" class="button button-secondary">
      <?php esc_html_e('Theme Info', 'perfume-store-fse'); ?>
    </a>
  </p>
</div>
