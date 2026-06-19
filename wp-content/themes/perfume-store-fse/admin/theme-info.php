<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Theme Admin Info class (Singleton)
 */
if (!class_exists('Perfume_Store_FSE_Theme_Info')) {

  class Perfume_Store_FSE_Theme_Info
  {
    const NOTICE_USER_META_KEY   = 'perfume_store_fse_notice_dismissed';
    const NOTICE_CSS_CLASS       = 'perfume-store-fse-notice';
    const NOTICE_REAPPEAR_DAYS   = 7; // Days after which the notice reappears

    /**
     * Hold the class instance
     *
     * @var Perfume_Store_FSE_Theme_Info|null
     */
    private static $instance = null;

    /**
     * Cached decision for whether to show the notice this request
     *
     * @var bool|null
     */
    private $notice_display_decision = null;

    /**
     * Get the singleton instance
     *
     * @return Perfume_Store_FSE_Theme_Info
     */
    public static function get_instance()
    {
      if (self::$instance === null) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    /**
     * Private constructor to prevent multiple instances
     */
    private function __construct()
    {
      add_action('admin_menu', array($this, 'theme_page'));
      add_action('after_switch_theme', array($this, 'theme_notification_reset'));
      add_action('admin_notices', array($this, 'render_theme_notification'));
      add_action('admin_enqueue_scripts', array($this, 'enqueue_notice_script'));
      add_action('wp_ajax_perfume_store_fse_notification_dismissal', array($this, 'theme_notification_ajax_callback'));
    }

    /**
     * Prevent cloning
     */
    public function __clone()
    {
      _doing_it_wrong(
        __FUNCTION__,
        esc_html__('Cloning is not allowed.', 'perfume-store-fse'),
        '1.0.0'
      );
    }

    /**
     * Prevent unserialization
     */
    public function __wakeup()
    {
      _doing_it_wrong(
        __FUNCTION__,
        esc_html__('Unserializing instances is not allowed.', 'perfume-store-fse'),
        '1.0.0'
      );
    }

    /**
     * Theme Page under Appearance
     *
     * @return void
     */
    public function theme_page()
    {
      add_theme_page(
        esc_html__('Theme Info', 'perfume-store-fse'),
        esc_html__('Theme Info', 'perfume-store-fse'),
        'edit_theme_options',
        'perfume-store-fse-page',
        array($this, 'theme_page_render_callback')
      );
    }

    /**
     * Theme Page Render Callback
     *
     * @return void
     */
    public function theme_page_render_callback()
    {
      $template = get_theme_file_path('admin/theme-page-template.php');

      if (file_exists($template)) {
        require $template;
      }
    }

    /**
     * Theme Notification Reset
     * Clears all user dismissal data when switching themes
     *
     * @return void
     */
    public function theme_notification_reset()
    {
      delete_metadata('user', 0, self::NOTICE_USER_META_KEY, '', true);
    }

    /**
     * Check if notice should be displayed
     *
     * @return bool
     */
    private function should_display_notice()
    {
      // Micro-optimization: only compute once per request.
      if ($this->notice_display_decision !== null) {
        return $this->notice_display_decision;
      }

      $user_id        = get_current_user_id();
      $dismissed_time = get_user_meta($user_id, self::NOTICE_USER_META_KEY, true);

      if (empty($dismissed_time) || !is_numeric($dismissed_time)) {
        $this->notice_display_decision = true;
        return $this->notice_display_decision;
      }

      // Use WP's current_time for consistency with stored timestamp
      $days_passed = (current_time('timestamp') - $dismissed_time) / DAY_IN_SECONDS;

      $this->notice_display_decision = ($days_passed >= self::NOTICE_REAPPEAR_DAYS);
      return $this->notice_display_decision;
    }

    /**
     * Render Theme Notification (if allowed and needed)
     *
     * @return void
     */
    public function render_theme_notification()
    {
      if (!current_user_can('edit_theme_options')) {
        return;
      }

      if ($this->should_display_notice()) {
        $template = get_theme_file_path('admin/theme-notice-template.php');

        if (file_exists($template)) {
          require $template;
        }
      }
    }

    /**
     * Enqueue Notice Script
     *
     * @return void
     */
    public function enqueue_notice_script()
    {
      if (!current_user_can('edit_theme_options') || !$this->should_display_notice()) {
        return;
      }

      wp_enqueue_script(
        'perfume-store-fse-admin-notice',
        get_theme_file_uri('admin/admin-notice.js'),
        array('jquery'),
        $this->get_theme_version(),
        true
      );

      wp_localize_script(
        'perfume-store-fse-admin-notice',
        'perfume_store_fse_notice',
        array(
          'nonce'        => wp_create_nonce('perfume_store_fse_notification_nonce'),
          'action'       => 'perfume_store_fse_notification_dismissal',
          'ajax_url'     => admin_url('admin-ajax.php'),
          'notice_class' => self::NOTICE_CSS_CLASS,
        )
      );
    }

    /**
     * Get Theme Version
     *
     * @return string
     */
    private function get_theme_version()
    {
      $theme = wp_get_theme();
      return $theme->get('Version');
    }

    /**
     * Theme Notification Ajax Callback
     *
     * @return void
     */
    public function theme_notification_ajax_callback()
    {
      check_ajax_referer('perfume_store_fse_notification_nonce', 'nonce');

      if (!current_user_can('edit_theme_options')) {
        wp_send_json_error(
          array('message' => esc_html__('Unauthorized access.', 'perfume-store-fse')),
          403
        );
      }

      $user_id = get_current_user_id();

      // Store using current_time('timestamp') for consistency with should_display_notice()
      update_user_meta($user_id, self::NOTICE_USER_META_KEY, current_time('timestamp'));

      wp_send_json_success(
        array('message' => esc_html__('Notice dismissed successfully.', 'perfume-store-fse'))
      );
    }
  }

  // Instantiate singleton
  Perfume_Store_FSE_Theme_Info::get_instance();
}
