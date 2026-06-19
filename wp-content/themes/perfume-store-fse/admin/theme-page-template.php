<?php

// Exit if accessed directly.
if (! defined('ABSPATH')) {
  exit;
}

// Theme Object
$perfume_store_fse_theme = wp_get_theme();

// Essential Links
$pro_url     = "https://designorbital.com/wordpress-theme/fragrance-shop-wordpress-theme-perfume-store-fse-pro/";
$demo_url    = "https://themes.designorbital.com/perfume-store-fse-pro/";
$support_url = "https://designorbital.com/support/"
?>

<div class="wrap">
  <h1><?php esc_html_e('Theme Info', 'perfume-store-fse'); ?></h1>

  <div id="welcome-panel" class="welcome-panel">
    <div class="welcome-panel-content">
      <div class="welcome-panel-header">
        <div class="welcome-panel-header-image">
          <svg preserveAspectRatio="xMidYMin slice" fill="none" viewBox="0 0 1232 240" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <g clip-path="url(#a)">
              <path fill="#0a192f" d="M0 0h1232v240H0z"></path>
              <ellipse cx="616" cy="232" fill="url(#b)" opacity=".05" rx="1497" ry="249"></ellipse>
              <mask id="d" width="1000" height="400" x="232" y="20" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                <path fill="url(#c)" d="M0 0h1000v400H0z" transform="translate(232 20)"></path>
              </mask>
              <g stroke-width="2" mask="url(#d)">
                <path stroke="url(#e)" d="M387 20v1635"></path>
                <path stroke="url(#f)" d="M559.5 20v1635"></path>
                <path stroke="url(#g)" d="M732 20v1635"></path>
                <path stroke="url(#h)" d="M904.5 20v1635"></path>
                <path stroke="url(#i)" d="M1077 20v1635"></path>
              </g>
            </g>
            <defs>
              <linearGradient id="e" x1="387.5" x2="387.5" y1="20" y2="1655" gradientUnits="userSpaceOnUse">
                <stop stop-color="#3858E9" stop-opacity="0"></stop>
                <stop offset=".297" stop-color="#3858E9"></stop>
                <stop offset=".734" stop-color="#3858E9"></stop>
                <stop offset="1" stop-color="#3858E9" stop-opacity="0"></stop>
                <stop offset="1" stop-color="#3858E9" stop-opacity="0"></stop>
              </linearGradient>
              <linearGradient id="f" x1="560" x2="560" y1="20" y2="1655" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFFCB5" stop-opacity="0"></stop>
                <stop offset="0" stop-color="#FFFCB5" stop-opacity="0"></stop>
                <stop offset=".297" stop-color="#FFFCB5"></stop>
                <stop offset=".734" stop-color="#FFFCB5"></stop>
                <stop offset="1" stop-color="#FFFCB5" stop-opacity="0"></stop>
              </linearGradient>
              <linearGradient id="g" x1="732.5" x2="732.5" y1="20" y2="1655" gradientUnits="userSpaceOnUse">
                <stop stop-color="#C7FFDB" stop-opacity="0"></stop>
                <stop offset=".297" stop-color="#C7FFDB"></stop>
                <stop offset=".693" stop-color="#C7FFDB"></stop>
                <stop offset="1" stop-color="#C7FFDB" stop-opacity="0"></stop>
              </linearGradient>
              <linearGradient id="h" x1="905" x2="905" y1="20" y2="1655" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FFB7A7" stop-opacity="0"></stop>
                <stop offset=".297" stop-color="#FFB7A7"></stop>
                <stop offset=".734" stop-color="#FFB7A7"></stop>
                <stop offset="1" stop-color="#3858E9" stop-opacity="0"></stop>
                <stop offset="1" stop-color="#FFB7A7" stop-opacity="0"></stop>
              </linearGradient>
              <linearGradient id="i" x1="1077.5" x2="1077.5" y1="20" y2="1655" gradientUnits="userSpaceOnUse">
                <stop stop-color="#7B90FF" stop-opacity="0"></stop>
                <stop offset=".297" stop-color="#7B90FF"></stop>
                <stop offset=".734" stop-color="#7B90FF"></stop>
                <stop offset="1" stop-color="#3858E9" stop-opacity="0"></stop>
                <stop offset="1" stop-color="#7B90FF" stop-opacity="0"></stop>
              </linearGradient>
              <radialGradient id="b" cx="0" cy="0" r="1" gradientTransform="matrix(0 249 -1497 0 616 232)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#3858E9"></stop>
                <stop offset="1" stop-color="#0a192f" stop-opacity="0"></stop>
              </radialGradient>
              <radialGradient id="c" cx="0" cy="0" r="1" gradientTransform="matrix(0 765 -1912.5 0 500 -110)" gradientUnits="userSpaceOnUse">
                <stop offset=".161" stop-color="#0a192f" stop-opacity="0"></stop>
                <stop offset=".682"></stop>
              </radialGradient>
              <clipPath id="a">
                <path fill="#fff" d="M0 0h1232v240H0z"></path>
              </clipPath>
            </defs>
          </svg>
        </div>
        <h2><?php echo esc_html($perfume_store_fse_theme->get('Name')); ?></h2>
        <p>
          <a href="<?php echo esc_url($pro_url); ?>" class="button button-primary" target="_blank">
            <?php esc_html_e('Upgrade Now', 'perfume-store-fse'); ?>
          </a>
          <a href="<?php echo esc_url($demo_url); ?>" class="button button-secondary" target="_blank">
            <?php esc_html_e('Pro Demo', 'perfume-store-fse'); ?>
          </a>
          <a href="<?php echo esc_url($support_url); ?>" class="button button-secondary" target="_blank">
            <?php esc_html_e('Support', 'perfume-store-fse'); ?>
          </a>
        </p>
      </div>
      <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <rect width="48" height="48" rx="4" fill="#0a192f"></rect>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M32.0668 17.0854L28.8221 13.9454L18.2008 24.671L16.8983 29.0827L21.4257 27.8309L32.0668 17.0854ZM16 32.75H24V31.25H16V32.75Z" fill="white"></path>
          </svg>
          <div class="welcome-panel-column-content">
            <h3><?php esc_html_e('Discount Code: WPLOVE', 'perfume-store-fse'); ?></h3>
            <p><?php esc_html_e('Use discount code WPLOVE to upgrade to the Pro theme or bundle and unlock premium features at a special price.', 'perfume-store-fse'); ?></p>
          </div>
        </div>
        <div class="welcome-panel-column">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <rect width="48" height="48" rx="4" fill="#0a192f"></rect>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 16h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V18a2 2 0 0 1 2-2zm12 1.5H18a.5.5 0 0 0-.5.5v3h13v-3a.5.5 0 0 0-.5-.5zm.5 5H22v8h8a.5.5 0 0 0 .5-.5v-7.5zm-10 0h-3V30a.5.5 0 0 0 .5.5h2.5v-8z" fill="#fff"></path>
          </svg>
          <div class="welcome-panel-column-content">
            <h3><?php esc_html_e('150+ Predesigned Patterns', 'perfume-store-fse'); ?></h3>
            <p><?php esc_html_e('Access 150+ professionally designed patterns to quickly build beautiful, responsive layouts for any type of website effortlessly.', 'perfume-store-fse'); ?></p>
          </div>
        </div>
        <div class="welcome-panel-column">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <rect width="48" height="48" rx="4" fill="#0a192f"></rect>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M31 24a7 7 0 0 1-7 7V17a7 7 0 0 1 7 7zm-7-8a8 8 0 1 1 0 16 8 8 0 0 1 0-16z" fill="#fff"></path>
          </svg>
          <div class="welcome-panel-column-content">
            <h3><?php esc_html_e('25+ Blocks & Extensions', 'perfume-store-fse'); ?></h3>
            <p><?php esc_html_e('Enhance your site with 25+ powerful blocks and extensions, adding advanced functionality, flexibility, and seamless customization options.', 'perfume-store-fse'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
