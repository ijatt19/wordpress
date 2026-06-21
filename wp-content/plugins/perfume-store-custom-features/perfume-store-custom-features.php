<?php
/**
 * Plugin Name: Perfume Store Custom Features
 * Description: Custom features for Perfume Store FSE child theme: Scent Notes, Gift Wrapping at Checkout, and Free Tester Progress Bar in Cart.
 * Version: 1.0.0
 * Author: Antigravity
 * Text Domain: perfume-store-custom-features
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Check if WooCommerce is active
add_action( 'plugins_loaded', 'pscf_check_woocommerce_active' );
function pscf_check_woocommerce_active() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        // Deactivate the plugin or display notice
        add_action( 'admin_notices', 'pscf_woocommerce_missing_notice' );
        return;
    }
    
    // Initialize plugin features
    pscf_init_features();
}

function pscf_woocommerce_missing_notice() {
    echo '<div class="error"><p>' . esc_html__( 'Perfume Store Custom Features membutuhkan WooCommerce untuk diaktifkan.', 'perfume-store-custom-features' ) . '</p></div>';
}

function pscf_init_features() {
    // ----------------------------------------------------
    // Asset Enqueue
    // ----------------------------------------------------
    add_action( 'wp_enqueue_scripts', 'pscf_enqueue_assets' );
    
    // ----------------------------------------------------
    // Feature 1: Scent Notes
    // ----------------------------------------------------
    add_action( 'woocommerce_product_options_general_product_data', 'pscf_add_scent_notes_fields' );
    add_action( 'woocommerce_process_product_meta', 'pscf_save_scent_notes_fields' );
    add_action( 'woocommerce_single_product_summary', 'pscf_display_scent_notes', 35 );
    
    // ----------------------------------------------------
    // Feature 2: Gift Wrapping
    // ----------------------------------------------------
    add_action( 'woocommerce_after_checkout_billing_form', 'pscf_checkout_gift_wrap_fields' );
    add_action( 'wp_ajax_pscf_update_gift_wrap_session', 'pscf_update_gift_wrap_session' );
    add_action( 'wp_ajax_nopriv_pscf_update_gift_wrap_session', 'pscf_update_gift_wrap_session' );
    add_action( 'wp_ajax_pscf_update_gift_note_session', 'pscf_update_gift_note_session' );
    add_action( 'wp_ajax_nopriv_pscf_update_gift_note_session', 'pscf_update_gift_note_session' );
    add_action( 'woocommerce_cart_calculate_fees', 'pscf_add_gift_wrap_fee', 20, 1 );
    add_action( 'woocommerce_checkout_create_order', 'pscf_save_gift_wrap_order_meta', 10, 2 );
    add_action( 'woocommerce_admin_order_data_after_billing_address', 'pscf_display_gift_wrap_in_admin_order_meta', 10, 1 );
    add_action( 'woocommerce_thankyou', 'pscf_clear_session_after_purchase', 10, 1 );
    
    // ----------------------------------------------------
    // Feature 3: Free Tester Progress Bar
    // ----------------------------------------------------
    add_action( 'woocommerce_before_cart', 'pscf_display_free_tester_progress' );
    add_action( 'woocommerce_before_checkout_form', 'pscf_display_free_tester_progress' );
    add_action( 'woocommerce_checkout_create_order', 'pscf_save_free_tester_order_meta', 11, 2 );
    add_action( 'woocommerce_admin_order_data_after_billing_address', 'pscf_display_free_tester_in_admin_order_meta', 11, 1 );
    add_action( 'wp_ajax_pscf_get_updated_progress_bar', 'pscf_ajax_get_updated_progress_bar' );
    add_action( 'wp_ajax_nopriv_pscf_get_updated_progress_bar', 'pscf_ajax_get_updated_progress_bar' );
    add_action( 'wp_ajax_pscf_update_tester_selection', 'pscf_update_tester_selection' );
    add_action( 'wp_ajax_nopriv_pscf_update_tester_selection', 'pscf_update_tester_selection' );
    
    // ----------------------------------------------------
    // Feature 4: Pre-Order System
    // ----------------------------------------------------
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'pscf_custom_add_to_cart_text', 10, 2 );
    add_filter( 'woocommerce_product_add_to_cart_text', 'pscf_custom_add_to_cart_text', 10, 2 );
    add_filter( 'woocommerce_product_add_to_cart_url', 'pscf_custom_add_to_cart_url', 10, 2 );
    add_filter( 'woocommerce_add_to_cart_validation', 'pscf_restrict_cart_to_logged_in_users', 10, 3 );
    add_filter( 'woocommerce_loop_add_to_cart_link', 'pscf_custom_loop_add_to_cart_link', 10, 3 );
    add_action( 'woocommerce_single_product_summary', 'pscf_display_preorder_badge', 15 );
    add_filter( 'woocommerce_cart_item_name', 'pscf_preorder_cart_item_name', 10, 3 );
    add_action( 'woocommerce_checkout_create_order_line_item', 'pscf_add_preorder_item_meta', 10, 4 );
    
    // Customer Notices
    add_action( 'woocommerce_thankyou', 'pscf_display_preorder_order_notice', 15, 1 );
    add_action( 'woocommerce_order_details_after_order_table', 'pscf_display_preorder_order_notice', 15, 1 );
    add_action( 'woocommerce_email_before_order_table', 'pscf_email_preorder_notice', 15, 4 );
    
    // Admin & Status Automation
    add_action( 'woocommerce_checkout_order_processed', 'pscf_auto_hold_preorder_orders', 20, 3 );
    add_filter( 'manage_edit-shop_order_columns', 'pscf_add_preorder_order_column' );
    add_filter( 'manage_woocommerce_page_wc-orders_columns', 'pscf_add_preorder_order_column' );
    add_action( 'manage_shop_order_posts_custom_column', 'pscf_populate_preorder_order_column', 10, 2 );
    add_action( 'manage_woocommerce_page_wc-orders_custom_column', 'pscf_populate_preorder_order_column_hpos', 10, 2 );
    
    // ----------------------------------------------------
    // Feature 5: Warranty Claim & Refund
    // ----------------------------------------------------
    add_action( 'woocommerce_order_details_after_order_table', 'pscf_display_warranty_claim_form', 20, 1 );
    add_action( 'template_redirect', 'pscf_handle_warranty_claim_submission' );
    add_action( 'add_meta_boxes', 'pscf_add_warranty_claim_metabox' );
    add_action( 'admin_init', 'pscf_handle_admin_warranty_decision' );
    
    // Column status in admin list
    add_filter( 'manage_edit-shop_order_columns', 'pscf_add_warranty_claim_order_column' );
    add_filter( 'manage_woocommerce_page_wc-orders_columns', 'pscf_add_warranty_claim_order_column' );
    add_action( 'manage_shop_order_posts_custom_column', 'pscf_populate_warranty_claim_order_column', 10, 2 );
    add_action( 'manage_woocommerce_page_wc-orders_custom_column', 'pscf_populate_warranty_claim_order_column_hpos', 10, 2 );
    
    // Account Page Menu Filter & Redirection
    add_filter( 'woocommerce_account_menu_items', 'pscf_custom_account_menu_items', 20, 1 );
    add_action( 'template_redirect', 'pscf_redirect_downloads_endpoint' );
    
    // Account Dashboard Shortcut Cards
    add_action( 'woocommerce_account_dashboard', 'pscf_custom_dashboard_cards' );
    
    // Floating Cart Widget
    add_action( 'wp_footer', 'pscf_render_floating_cart' );
    add_filter( 'woocommerce_add_to_cart_fragments', 'pscf_add_to_cart_fragments' );

    // Hardcoded Services Page Router
    add_action( 'template_redirect', 'pscf_render_hardcoded_layanan_page' );
}

/**
 * Enqueue CSS & JS assets
 */
function pscf_enqueue_assets() {
    wp_enqueue_style( 'pscf-style', plugins_url( 'assets/css/style.css', __FILE__ ), array(), time() );
    wp_enqueue_script( 'pscf-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), time(), true );
}

/**
 * Add Scent Notes Custom Fields to Product General Settings
 */
function pscf_add_scent_notes_fields() {
    echo '<div class="options_group pscf-admin-fields">';
    echo '<h2>' . esc_html__( 'Scent Profile (Karakter Aroma)', 'perfume-store-custom-features' ) . '</h2>';
    
    woocommerce_wp_text_input( array(
        'id'          => '_scent_top_notes',
        'label'       => esc_html__( 'Top Notes 🌟', 'perfume-store-custom-features' ),
        'placeholder' => esc_html__( 'Contoh: Bergamot, Lemon, Mandarin Orange', 'perfume-store-custom-features' ),
        'desc_tip'    => 'true',
        'description' => esc_html__( 'Aroma pertama yang tercium (biasanya bertahan 15 menit pertama).', 'perfume-store-custom-features' ),
    ) );
    
    woocommerce_wp_text_input( array(
        'id'          => '_scent_middle_notes',
        'label'       => esc_html__( 'Middle Notes 🌸', 'perfume-store-custom-features' ),
        'placeholder' => esc_html__( 'Contoh: Jasmine, Rose, Lavender, Nutmeg', 'perfume-store-custom-features' ),
        'desc_tip'    => 'true',
        'description' => esc_html__( 'Inti atau "jantung" dari wangi parfum (bertahan beberapa jam).', 'perfume-store-custom-features' ),
    ) );
    
    woocommerce_wp_text_input( array(
        'id'          => '_scent_base_notes',
        'label'       => esc_html__( 'Base Notes 🪵', 'perfume-store-custom-features' ),
        'placeholder' => esc_html__( 'Contoh: Cedarwood, Amber, Musk, Vanilla', 'perfume-store-custom-features' ),
        'desc_tip'    => 'true',
        'description' => esc_html__( 'Aroma dasar yang tertinggal paling lama di kulit/baju.', 'perfume-store-custom-features' ),
    ) );
    
    echo '<hr style="border:none; border-top: 1px solid #eee; margin: 15px 0;">';
    echo '<h2>' . esc_html__( 'Free Tester Eligibility', 'perfume-store-custom-features' ) . '</h2>';
    
    woocommerce_wp_checkbox( array(
        'id'            => '_pscf_is_tester',
        'label'         => esc_html__( 'Sediakan sebagai Tester Gratis?', 'perfume-store-custom-features' ),
        'description'   => esc_html__( 'Centang jika produk ini boleh dipilih pelanggan sebagai sampel tester gratis saat belanjaan mencapai target.', 'perfume-store-custom-features' ),
        'desc_tip'      => false,
    ) );
    
    echo '<hr style="border:none; border-top: 1px solid #eee; margin: 15px 0;">';
    echo '<h2>' . esc_html__( 'Pre-Order Settings', 'perfume-store-custom-features' ) . '</h2>';
    
    woocommerce_wp_checkbox( array(
        'id'            => '_pscf_is_preorder',
        'label'         => esc_html__( 'Aktifkan Pre-Order?', 'perfume-store-custom-features' ),
        'description'   => esc_html__( 'Centang jika produk ini dijual dengan sistem Pre-Order.', 'perfume-store-custom-features' ),
        'desc_tip'      => false,
    ) );

    woocommerce_wp_select( array(
        'id'            => '_pscf_preorder_quick_select',
        'label'         => esc_html__( 'Set Cepat Estimasi', 'perfume-store-custom-features' ),
        'options'       => array(
            ''    => esc_html__( '-- Pilih Estimasi Cepat --', 'perfume-store-custom-features' ),
            '7'   => esc_html__( '1 Minggu Lagi (+7 hari)', 'perfume-store-custom-features' ),
            '14'  => esc_html__( '2 Minggu Lagi (+14 hari)', 'perfume-store-custom-features' ),
            '21'  => esc_html__( '3 Minggu Lagi (+21 hari)', 'perfume-store-custom-features' ),
            '30'  => esc_html__( '1 Bulan Lagi (+30 hari)', 'perfume-store-custom-features' ),
        ),
        'description'   => esc_html__( 'Pilih untuk mengisi tanggal estimasi secara otomatis dari hari ini.', 'perfume-store-custom-features' ),
        'desc_tip'      => false,
    ) );

    woocommerce_wp_text_input( array(
        'id'            => '_pscf_preorder_date',
        'label'         => esc_html__( 'Estimasi Tanggal Tersedia', 'perfume-store-custom-features' ),
        'type'          => 'date',
        'description'   => esc_html__( 'Pilih tanggal atau ubah manual kapan barang siap dikirim.', 'perfume-store-custom-features' ),
        'desc_tip'      => false,
    ) );
    
    echo '</div>';
    
    // Inline Script to link Quick Select with Date Input
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#_pscf_preorder_quick_select').on('change', function() {
            var val = $(this).val();
            if (!val) return;
            var today = new Date();
            var daysToAdd = parseInt(val, 10);
            if (!isNaN(daysToAdd)) {
                today.setDate(today.getDate() + daysToAdd);
                var year = today.getFullYear();
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var day = String(today.getDate()).padStart(2, '0');
                $('#_pscf_preorder_date').val(year + '-' + month + '-' + day);
            }
        });
    });
    </script>
    <?php
}

/**
 * Save Scent Notes Custom Fields Value
 */
function pscf_save_scent_notes_fields( $post_id ) {
    $top = isset( $_POST['_scent_top_notes'] ) ? sanitize_text_field( $_POST['_scent_top_notes'] ) : '';
    $middle = isset( $_POST['_scent_middle_notes'] ) ? sanitize_text_field( $_POST['_scent_middle_notes'] ) : '';
    $base = isset( $_POST['_scent_base_notes'] ) ? sanitize_text_field( $_POST['_scent_base_notes'] ) : '';
    $is_tester = isset( $_POST['_pscf_is_tester'] ) ? 'yes' : 'no';
    $is_preorder = isset( $_POST['_pscf_is_preorder'] ) ? 'yes' : 'no';
    $preorder_date = isset( $_POST['_pscf_preorder_date'] ) ? sanitize_text_field( $_POST['_pscf_preorder_date'] ) : '';

    update_post_meta( $post_id, '_scent_top_notes', $top );
    update_post_meta( $post_id, '_scent_middle_notes', $middle );
    update_post_meta( $post_id, '_scent_base_notes', $base );
    update_post_meta( $post_id, '_pscf_is_tester', $is_tester );
    update_post_meta( $post_id, '_pscf_is_preorder', $is_preorder );
    update_post_meta( $post_id, '_pscf_preorder_date', $preorder_date );
}

/**
 * Display Scent Profile on Single Product Page
 */
function pscf_display_scent_notes() {
    global $product;
    if ( ! $product ) {
        return;
    }
    
    $post_id = $product->get_id();
    $top = get_post_meta( $post_id, '_scent_top_notes', true );
    $middle = get_post_meta( $post_id, '_scent_middle_notes', true );
    $base = get_post_meta( $post_id, '_scent_base_notes', true );

    // If all empty, return
    if ( empty( $top ) && empty( $middle ) && empty( $base ) ) {
        return;
    }

    echo '<div class="pscf-scent-profile">';
    echo '<h3 class="pscf-section-title">' . esc_html__( 'Scent Profile', 'perfume-store-custom-features' ) . '</h3>';
    echo '<p class="pscf-section-desc">' . esc_html__( 'Karakteristik wewangian unik yang akan Anda rasakan:', 'perfume-store-custom-features' ) . '</p>';
    
    echo '<div class="pscf-notes-grid">';
    
    if ( ! empty( $top ) ) {
        echo '<div class="pscf-note-box top">';
        echo '<div class="pscf-note-header">';
        echo '<span class="pscf-icon">✨</span>';
        echo '<h4>' . esc_html__( 'Top Notes', 'perfume-store-custom-features' ) . '</h4>';
        echo '</div>';
        echo '<p class="pscf-note-content">' . esc_html( $top ) . '</p>';
        echo '</div>';
    }
    
    if ( ! empty( $middle ) ) {
        echo '<div class="pscf-note-box middle">';
        echo '<div class="pscf-note-header">';
        echo '<span class="pscf-icon">🌸</span>';
        echo '<h4>' . esc_html__( 'Middle Notes', 'perfume-store-custom-features' ) . '</h4>';
        echo '</div>';
        echo '<p class="pscf-note-content">' . esc_html( $middle ) . '</p>';
        echo '</div>';
    }
    
    if ( ! empty( $base ) ) {
        echo '<div class="pscf-note-box base">';
        echo '<div class="pscf-note-header">';
        echo '<span class="pscf-icon">🪵</span>';
        echo '<h4>' . esc_html__( 'Base Notes', 'perfume-store-custom-features' ) . '</h4>';
        echo '</div>';
        echo '<p class="pscf-note-content">' . esc_html( $base ) . '</p>';
        echo '</div>';
    }
    
    echo '</div>'; // pscf-notes-grid
    echo '</div>'; // pscf-scent-profile
}

/**
 * Display Gift Wrap Option in Checkout Billing Form
 */
function pscf_checkout_gift_wrap_fields( $checkout ) {
    $wrap_enabled = WC()->session->get( 'pscf_enable_gift_wrap' ) ? 1 : 0;
    $gift_note = WC()->session->get( 'pscf_gift_note' ) ? WC()->session->get( 'pscf_gift_note' ) : '';
    
    echo '<div class="pscf-checkout-gift-wrap">';
    echo '<h3 class="pscf-checkout-title">' . esc_html__( 'Layanan Tambahan', 'perfume-store-custom-features' ) . '</h3>';
    
    woocommerce_form_field( 'pscf_enable_gift_wrap', array(
        'type'    => 'checkbox',
        'class'   => array( 'pscf-checkbox-field-wrap' ),
        'label'   => sprintf( esc_html__( 'Bungkus Kado Cantik & Kartu Ucapan (%s)', 'perfume-store-custom-features' ), wc_price( 15000 ) ),
        'default' => $wrap_enabled,
    ), $checkout->get_value( 'pscf_enable_gift_wrap' ) );
    
    $style = $wrap_enabled ? '' : 'display: none;';
    echo '<div class="pscf-gift-note-container" style="' . esc_attr( $style ) . '">';
    woocommerce_form_field( 'pscf_gift_note', array(
        'type'        => 'textarea',
        'class'       => array( 'pscf-textarea-gift-note' ),
        'label'       => esc_html__( 'Pesan Kartu Ucapan', 'perfume-store-custom-features' ),
        'placeholder' => esc_html__( 'Tulis pesan ucapan Anda di sini... (cth: Happy Birthday! Semoga kamu suka ya..)', 'perfume-store-custom-features' ),
        'default'     => $gift_note,
    ), $checkout->get_value( 'pscf_gift_note' ) );
    echo '</div>';
    
    echo '</div>';
}

/**
 * AJAX Update Gift Wrap Session
 */
function pscf_update_gift_wrap_session() {
    if ( isset( $_POST['enable_gift_wrap'] ) ) {
        $enable = intval( $_POST['enable_gift_wrap'] );
        WC()->session->set( 'pscf_enable_gift_wrap', $enable );
        if ( ! $enable ) {
            WC()->session->set( 'pscf_gift_note', '' );
        }
    }
    wp_send_json_success();
}

/**
 * AJAX Update Gift Note Session
 */
function pscf_update_gift_note_session() {
    if ( isset( $_POST['gift_note'] ) ) {
        $note = sanitize_textarea_field( $_POST['gift_note'] );
        WC()->session->set( 'pscf_gift_note', $note );
    }
    wp_send_json_success();
}

/**
 * Add Fee to Cart if Gift Wrapping option is enabled
 */
function pscf_add_gift_wrap_fee( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }
    
    $wrap_enabled = WC()->session->get( 'pscf_enable_gift_wrap' );
    if ( $wrap_enabled ) {
        $cart->add_fee( esc_html__( 'Bungkus Kado & Kartu Ucapan', 'perfume-store-custom-features' ), 15000, false );
    }
}

/**
 * Save Gift Wrap Custom Fields to Order Metadata
 */
function pscf_save_gift_wrap_order_meta( $order, $data ) {
    $enable = isset( $_POST['pscf_enable_gift_wrap'] ) ? 1 : 0;
    $note = isset( $_POST['pscf_gift_note'] ) ? sanitize_textarea_field( $_POST['pscf_gift_note'] ) : '';

    if ( empty( $enable ) ) {
        $enable = WC()->session->get( 'pscf_enable_gift_wrap' ) ? 1 : 0;
        $note = WC()->session->get( 'pscf_gift_note' );
    }

    if ( $enable ) {
        $order->update_meta_data( '_pscf_gift_wrap', 'Yes' );
        if ( ! empty( $note ) ) {
            $order->update_meta_data( '_pscf_gift_note', $note );
        }
    } else {
        $order->update_meta_data( '_pscf_gift_wrap', 'No' );
    }
}

/**
 * Display Gift Wrap details on Admin Order Details Page
 */
function pscf_display_gift_wrap_in_admin_order_meta( $order ) {
    $gift_wrap = $order->get_meta( '_pscf_gift_wrap' );
    $gift_note = $order->get_meta( '_pscf_gift_note' );

    if ( $gift_wrap === 'Yes' ) {
        echo '<p><strong>' . esc_html__( 'Bungkus Kado:', 'perfume-store-custom-features' ) . '</strong> ' . esc_html__( 'Ya', 'perfume-store-custom-features' ) . '</p>';
        if ( ! empty( $gift_note ) ) {
            echo '<p><strong>' . esc_html__( 'Pesan Ucapan:', 'perfume-store-custom-features' ) . '</strong><br/>' . nl2br( esc_html( $gift_note ) ) . '</p>';
        }
    }
}

/**
 * Clear Session variables upon order completion
 */
function pscf_clear_session_after_purchase( $order_id ) {
    WC()->session->set( 'pscf_enable_gift_wrap', 0 );
    WC()->session->set( 'pscf_gift_note', '' );
    WC()->session->set( 'pscf_selected_tester', '' );
}

/**
 * Display Free Tester Sample Progress Bar in Cart / Checkout
 */
function pscf_display_free_tester_progress( $context = 'cart' ) {
    // Tampilkan Banner Alert Pre-Order di bagian paling atas jika ada item Pre-Order
    if ( function_exists( 'pscf_display_preorder_alert_banner' ) ) {
        pscf_display_preorder_alert_banner();
    }

    if ( ! WC()->cart || WC()->cart->is_empty() ) {
        return;
    }
    
    $subtotal = WC()->cart->get_subtotal();
    $threshold = 500000; // Rp 500.000
    
    $percentage = min( 100, round( ( $subtotal / $threshold ) * 100 ) );
    $remaining = $threshold - $subtotal;
    
    echo '<div class="pscf-free-tester-wrapper">';
    echo '<div class="pscf-tester-header">';
    
    if ( $remaining > 0 ) {
        echo '<span class="pscf-tester-icon">🎁</span>';
        echo '<div class="pscf-tester-text">';
        echo '<h4>' . esc_html__( 'Dapatkan Free Tester Sample!', 'perfume-store-custom-features' ) . '</h4>';
        echo '<p>' . sprintf( esc_html__( 'Belanja %s lagi untuk mendapatkan sampel tester parfum GRATIS!', 'perfume-store-custom-features' ), '<strong>' . wc_price( $remaining ) . '</strong>' ) . '</p>';
        echo '</div>';
    } else {
        echo '<span class="pscf-tester-icon success">🎉</span>';
        echo '<div class="pscf-tester-text">';
        echo '<h4 class="success">' . esc_html__( 'Selamat! Free Tester Menanti!', 'perfume-store-custom-features' ) . '</h4>';
        
        if ( $context === 'checkout' ) {
            echo '<p>' . esc_html__( 'Total belanjaan Anda memenuhi syarat untuk mendapatkan 1x botol tester parfum GRATIS.', 'perfume-store-custom-features' ) . '</p>';
            
            // Query products marked as tester
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'meta_query'     => array(
                    array(
                        'key'     => '_pscf_is_tester',
                        'value'   => 'yes',
                        'compare' => '=',
                    ),
                ),
            );
            $testers_query = new WP_Query( $args );
            $tester_options = array();
            if ( $testers_query->have_posts() ) {
                while ( $testers_query->have_posts() ) {
                    $testers_query->the_post();
                    $title = get_the_title();
                    // Bersihkan teks volume seperti 100ml, 50ml, 3.4 oz dll.
                    $clean_title = preg_replace( '/\s*\d+\s*(?:ml|ML|Ml|fl\.?\s*oz\.?|oz)\b/i', '', $title );
                    $tester_options[] = trim( $clean_title ) . ' (Sample 2ml)';
                }
                wp_reset_postdata();
            }

            // Fallback to default list if no products are tagged yet
            if ( empty( $tester_options ) ) {
                $tester_options = array(
                    'Decant YSL Libre (Sample 2ml)',
                    'Decant Bleu de Chanel (Sample 2ml)',
                    'Decant Dior Sauvage (Sample 2ml)',
                    'Decant YSL Black Opium (Sample 2ml)'
                );
            }
            
            $selected_tester = WC()->session->get( 'pscf_selected_tester' ) ? WC()->session->get( 'pscf_selected_tester' ) : '';
            echo '<div class="pscf-tester-selector-wrapper">';
            echo '<label for="pscf_selected_tester">' . esc_html__( 'Pilih Varian Tester Gratis Anda:', 'perfume-store-custom-features' ) . '</label>';
            echo '<span class="pscf-tester-selector-desc">' . esc_html__( '*Tester yang dikirimkan berupa botol sampel vial/decant ukuran 2ml', 'perfume-store-custom-features' ) . '</span>';
            echo '<select id="pscf_selected_tester" name="pscf_selected_tester" class="pscf-select-tester">';
            echo '<option value="">' . esc_html__( '-- Pilih Varian Tester --', 'perfume-store-custom-features' ) . '</option>';
            foreach ( $tester_options as $option ) {
                if ( ! empty( $option ) ) {
                    echo '<option value="' . esc_attr( $option ) . '" ' . selected( $selected_tester, $option, false ) . '>' . esc_html( $option ) . '</option>';
                }
            }
            echo '</select>';
            echo '</div>';
        } else {
            echo '<p>' . esc_html__( 'Total belanjaan Anda memenuhi syarat untuk mendapatkan 1x botol tester parfum GRATIS. Silakan pilih varian tester Anda di Halaman Checkout!', 'perfume-store-custom-features' ) . '</p>';
        }
        
        echo '</div>';
    }
    
    echo '</div>'; // pscf-tester-header
    
    echo '<div class="pscf-progress-bar-container">';
    echo '<div class="pscf-progress-bar-track">';
    echo '<div class="pscf-progress-bar-fill" style="width: ' . esc_attr( $percentage ) . '%;"></div>';
    echo '</div>';
    echo '<span class="pscf-progress-label">' . esc_html( $percentage ) . '%</span>';
    echo '</div>'; // pscf-progress-bar-container
    
    echo '</div>'; // pscf-free-tester-wrapper
}

/**
 * Save Free Tester eligibility to Order Metadata
 */
function pscf_save_free_tester_order_meta( $order, $data ) {
    $subtotal = WC()->cart->get_subtotal();
    $threshold = 500000;
    
    if ( $subtotal >= $threshold ) {
        $order->update_meta_data( '_pscf_free_tester', 'Yes' );
        $selected = WC()->session->get( 'pscf_selected_tester' ) ? WC()->session->get( 'pscf_selected_tester' ) : 'Belum memilih varian';
        $order->update_meta_data( '_pscf_selected_tester_variant', $selected );
    } else {
        $order->update_meta_data( '_pscf_free_tester', 'No' );
        $order->update_meta_data( '_pscf_selected_tester_variant', '' );
    }
}

/**
 * Display Free Tester status in Admin Order Details Page
 */
function pscf_display_free_tester_in_admin_order_meta( $order ) {
    $free_tester = $order->get_meta( '_pscf_free_tester' );
    $selected_variant = $order->get_meta( '_pscf_selected_tester_variant' );
    if ( $free_tester === 'Yes' ) {
        echo '<p style="color: #46b450; font-weight: bold; background: #e7f7ed; padding: 10px; border-radius: 4px; border: 1px solid #c2ebd1; display: inline-block; margin-top: 5px;">';
        echo '🎁 ' . esc_html__( 'Kirim dengan Free Tester Sample', 'perfume-store-custom-features' ) . '<br/>';
        echo '<span style="font-size: 0.9em; font-weight: normal; color: #333;">Varian: <strong>' . esc_html( $selected_variant ) . '</strong></span>';
        echo '</p>';
    }
}

/**
 * AJAX handler to fetch updated progress bar HTML
 */
function pscf_ajax_get_updated_progress_bar() {
    $context = isset( $_POST['context'] ) ? sanitize_text_field( $_POST['context'] ) : 'cart';
    pscf_display_free_tester_progress( $context );
    wp_die();
}

/**
 * AJAX handler to save tester selection
 */
function pscf_update_tester_selection() {
    if ( isset( $_POST['selected_tester'] ) ) {
        $tester = sanitize_text_field( $_POST['selected_tester'] );
        WC()->session->set( 'pscf_selected_tester', $tester );
    }
    wp_send_json_success();
}

/**
 * Pre-Order System Functions
 */

// Override Add to Cart Button Text for logged-out / logged-in users
function pscf_custom_add_to_cart_text( $text, $product ) {
    if ( ! is_user_logged_in() ) {
        $is_preorder = get_post_meta( $product->get_id(), '_pscf_is_preorder', true );
        if ( $is_preorder === 'yes' ) {
            return esc_html__( 'Login untuk Pre-Order 📅', 'perfume-store-custom-features' );
        }
        return esc_html__( 'Login untuk Beli 🛍️', 'perfume-store-custom-features' );
    }
    
    // If logged in, check if pre-order
    $is_preorder = get_post_meta( $product->get_id(), '_pscf_is_preorder', true );
    if ( $is_preorder === 'yes' ) {
        return esc_html__( 'Pre-Order Sekarang 📅', 'perfume-store-custom-features' );
    }
    return $text;
}

// Redirect add-to-cart URLs in archive pages directly to My Account with a redirect back URL
function pscf_custom_add_to_cart_url( $url, $product ) {
    if ( ! is_user_logged_in() ) {
        $product_url = $product->get_permalink();
        return esc_url( add_query_arg( 'redirect', urlencode( $product_url ), wc_get_page_permalink( 'myaccount' ) ) );
    }
    return $url;
}

// Restrict actual cart additions for logged-out users and redirect with notice
function pscf_restrict_cart_to_logged_in_users( $passed, $product_id, $quantity ) {
    if ( ! is_user_logged_in() ) {
        $product_url = get_permalink( $product_id );
        $login_url = add_query_arg( 'redirect', urlencode( $product_url ), wc_get_page_permalink( 'myaccount' ) );
        
        wc_add_notice( __( 'Silakan login atau daftar akun terlebih dahulu untuk membeli produk.', 'perfume-store-custom-features' ), 'error' );
        
        wp_safe_redirect( esc_url_raw( $login_url ) );
        exit;
    }
    return $passed;
}

// Build a clean, non-AJAX custom loop add-to-cart link for logged-out users
function pscf_custom_loop_add_to_cart_link( $html, $product, $args ) {
    if ( ! is_user_logged_in() ) {
        $product_url = $product->get_permalink();
        $login_url = add_query_arg( 'redirect', urlencode( $product_url ), wc_get_page_permalink( 'myaccount' ) );
        
        $class = 'button pscf-login-redirect-button';
        if ( isset( $args['class'] ) ) {
            $classes = explode( ' ', $args['class'] );
            // Remove AJAX classes to prevent theme AJAX script intercepting it
            $classes = array_diff( $classes, array( 'ajax_add_to_cart', 'add_to_cart_button', 'product_type_simple', 'product_type_variable' ) );
            $classes[] = 'button';
            $class = implode( ' ', $classes );
        }
        
        $text = pscf_custom_add_to_cart_text( '', $product );
        
        return sprintf(
            '<a href="%s" class="%s">%s</a>',
            esc_url( $login_url ),
            esc_attr( $class ),
            esc_html( $text )
        );
    }
    return $html;
}

// Display Pre-Order Badge on Single Product Page
function pscf_display_preorder_badge() {
    global $product;
    if ( ! $product ) {
        return;
    }
    
    $is_preorder = get_post_meta( $product->get_id(), '_pscf_is_preorder', true );
    $preorder_date = get_post_meta( $product->get_id(), '_pscf_preorder_date', true );
    
    if ( $is_preorder === 'yes' ) {
        echo '<div class="pscf-preorder-badge-wrapper">';
        echo '<span class="pscf-preorder-badge">' . esc_html__( 'Pre-Order', 'perfume-store-custom-features' ) . '</span>';
        if ( ! empty( $preorder_date ) ) {
            $formatted_date = pscf_format_indonesian_date( $preorder_date );
            echo '<span class="pscf-preorder-date-text">' . sprintf( esc_html__( 'Estimasi Ready: %s', 'perfume-store-custom-features' ), '<strong>' . esc_html( $formatted_date ) . '</strong>' ) . '</span>';
        }
        echo '</div>';
    }
}

// Display Pre-Order Note in Cart & Checkout (Plain text is bulletproof for blocks/emails/tables)
function pscf_preorder_cart_item_name( $name, $cart_item, $cart_item_key ) {
    $product_id = $cart_item['product_id'];
    $is_preorder = get_post_meta( $product_id, '_pscf_is_preorder', true );
    $preorder_date = get_post_meta( $product_id, '_pscf_preorder_date', true );
    
    if ( $is_preorder === 'yes' ) {
        $formatted_date = pscf_format_indonesian_date( $preorder_date );
        $date_text = ! empty( $formatted_date ) ? ' - Ready: ' . $formatted_date : '';
        $name .= ' (Pre-Order' . $date_text . ')';
    }
    return $name;
}

// Save Pre-Order Item Meta in Order
function pscf_add_preorder_item_meta( $item, $cart_item_key, $values, $order ) {
    $product_id = $values['product_id'];
    $is_preorder = get_post_meta( $product_id, '_pscf_is_preorder', true );
    $preorder_date = get_post_meta( $product_id, '_pscf_preorder_date', true );
    
    if ( $is_preorder === 'yes' ) {
        $item->update_meta_data( '_pscf_item_preorder', 'Yes' );
        if ( ! empty( $preorder_date ) ) {
            $formatted_date = pscf_format_indonesian_date( $preorder_date );
            $item->update_meta_data( '_pscf_item_preorder_date', $preorder_date );
            $item->add_meta_data( __( 'Tipe Pembelian', 'perfume-store-custom-features' ), 'Pre-Order (Ready: ' . $formatted_date . ')', true );
        } else {
            $item->add_meta_data( __( 'Tipe Pembelian', 'perfume-store-custom-features' ), 'Pre-Order', true );
        }
    }
}

// Auto-Hold orders containing Pre-Order items and add System Note
function pscf_auto_hold_preorder_orders( $order_id, $posted_data, $order ) {
    if ( ! $order_id ) {
        return;
    }
    
    $has_preorder = false;
    $dates = array();
    
    foreach ( $order->get_items() as $item_id => $item ) {
        $is_item_preorder = $item->get_meta( '_pscf_item_preorder' );
        if ( $is_item_preorder === 'Yes' ) {
            $has_preorder = true;
            $item_date = $item->get_meta( '_pscf_item_preorder_date' );
            if ( ! empty( $item_date ) ) {
                $dates[] = pscf_format_indonesian_date( $item_date );
            }
        }
    }
    
    if ( $has_preorder ) {
        $date_str = ! empty( $dates ) ? implode( ', ', array_unique( $dates ) ) : 'TBA';
        $note = sprintf( __( 'Sistem: Pesanan otomatis ditahan (On Hold) karena mengandung produk Pre-Order (Estimasi Ready: %s).', 'perfume-store-custom-features' ), $date_str );
        
        $order->update_status( 'on-hold', $note );
    }
}

// Add Custom Columns to Orders list in WordPress Dashboard (supports standard & HPOS)
function pscf_add_preorder_order_column( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $column ) {
        $new_columns[ $key ] = $column;
        if ( 'order_status' === $key ) {
            $new_columns['pscf_preorder'] = __( 'Pre-Order Info', 'perfume-store-custom-features' );
        }
    }
    return $new_columns;
}

// Populate orders list columns (Standard Posts Table)
function pscf_populate_preorder_order_column( $column, $post_id ) {
    if ( 'pscf_preorder' === $column ) {
        $order = wc_get_order( $post_id );
        if ( ! $order ) return;
        
        $has_preorder = 'No';
        $dates = array();
        
        foreach ( $order->get_items() as $item_id => $item ) {
            $is_item_preorder = $item->get_meta( '_pscf_item_preorder' );
            if ( $is_item_preorder === 'Yes' ) {
                $has_preorder = 'Yes';
                $item_date = $item->get_meta( '_pscf_item_preorder_date' );
                if ( ! empty( $item_date ) ) {
                    $dates[] = pscf_format_indonesian_date( $item_date );
                }
            }
        }
        
        if ( $has_preorder === 'Yes' ) {
            $date_str = ! empty( $dates ) ? implode( ', ', array_unique( $dates ) ) : 'TBA';
            echo '<span style="background-color: #2b4c7e; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em; display: inline-block;">📅 Pre-Order (' . esc_html( $date_str ) . ')</span>';
        } else {
            echo '<span style="color: #bbb;">-</span>';
        }
    }
}

// Populate orders list columns (HPOS Tables)
function pscf_populate_preorder_order_column_hpos( $column, $order ) {
    if ( $order ) {
        pscf_populate_preorder_order_column( $column, $order->get_id() );
    }
}

/**
 * Helper to format date string (YYYY-MM-DD) to Indonesian date format.
 */
function pscf_format_indonesian_date( $date_str ) {
    if ( empty( $date_str ) ) {
        return '';
    }
    
    $timestamp = strtotime( $date_str );
    if ( ! $timestamp ) {
        return $date_str; // Fallback
    }
    
    $months = array(
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );
    
    $day = date( 'j', $timestamp );
    $month_num = date( 'n', $timestamp );
    $year = date( 'Y', $timestamp );
    
    return $day . ' ' . $months[ $month_num ] . ' ' . $year;
}

/**
 * Display a premium alert banner on Cart & Checkout if pre-order items are in the cart.
 */
function pscf_display_preorder_alert_banner() {
    if ( ! WC()->cart || WC()->cart->is_empty() ) {
        return;
    }
    
    $preorder_items = array();
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product_id = $cart_item['product_id'];
        $is_preorder = get_post_meta( $product_id, '_pscf_is_preorder', true );
        if ( $is_preorder === 'yes' ) {
            $preorder_date = get_post_meta( $product_id, '_pscf_preorder_date', true );
            $formatted_date = pscf_format_indonesian_date( $preorder_date );
            $preorder_items[] = array(
                'name' => get_the_title( $product_id ),
                'date' => ! empty( $formatted_date ) ? $formatted_date : esc_html__( 'Hubungi Admin / TBA', 'perfume-store-custom-features' ),
            );
        }
    }
    
    if ( empty( $preorder_items ) ) {
        return;
    }
    
    echo '<div class="pscf-preorder-alert-banner">';
    echo '<div class="pscf-preorder-alert-icon">📅</div>';
    echo '<div class="pscf-preorder-alert-content">';
    echo '<h4>' . esc_html__( 'Pemberitahuan Pre-Order', 'perfume-store-custom-features' ) . '</h4>';
    echo '<p>' . esc_html__( 'Keranjang Anda mengandung produk Pre-Order. Seluruh pesanan Anda akan dikirim bersamaan setelah semua produk siap.', 'perfume-store-custom-features' ) . '</p>';
    echo '<ul class="pscf-preorder-alert-list">';
    foreach ( $preorder_items as $item ) {
        echo '<li><strong>' . esc_html( $item['name'] ) . '</strong>: ' . sprintf( esc_html__( 'Estimasi Ready: %s', 'perfume-store-custom-features' ), '<strong>' . esc_html( $item['date'] ) . '</strong>' ) . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}

/**
 * Display a notice on Checkout Success (Thank You) and Customer Order Details
 */
function pscf_display_preorder_order_notice( $order_id ) {
    if ( ! $order_id ) {
        return;
    }
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return;
    }
    
    $preorder_items = array();
    foreach ( $order->get_items() as $item_id => $item ) {
        $is_item_preorder = $item->get_meta( '_pscf_item_preorder' );
        if ( $is_item_preorder === 'Yes' ) {
            $item_date = $item->get_meta( '_pscf_item_preorder_date' );
            $formatted_date = pscf_format_indonesian_date( $item_date );
            $preorder_items[] = array(
                'name' => $item->get_name(),
                'date' => ! empty( $formatted_date ) ? $formatted_date : esc_html__( 'Hubungi Admin / TBA', 'perfume-store-custom-features' ),
            );
        }
    }
    
    if ( empty( $preorder_items ) ) {
        return;
    }
    
    echo '<div class="pscf-preorder-order-notice-box">';
    echo '<h4>📅 ' . esc_html__( 'Informasi Pengiriman Pre-Order', 'perfume-store-custom-features' ) . '</h4>';
    echo '<p>' . esc_html__( 'Pesanan Anda mengandung produk Pre-Order. Seluruh barang akan dikirimkan bersamaan setelah semua produk siap dikirim.', 'perfume-store-custom-features' ) . '</p>';
    echo '<ul class="pscf-preorder-order-notice-list">';
    foreach ( $preorder_items as $item ) {
        echo '<li><strong>' . esc_html( $item['name'] ) . '</strong>: ' . sprintf( esc_html__( 'Estimasi Ready: %s', 'perfume-store-custom-features' ), '<strong>' . esc_html( $item['date'] ) . '</strong>' ) . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}

/**
 * Display a notice in customer email notifications
 */
function pscf_email_preorder_notice( $order, $sent_to_admin, $plain_text, $email ) {
    $preorder_items = array();
    foreach ( $order->get_items() as $item_id => $item ) {
        $is_item_preorder = $item->get_meta( '_pscf_item_preorder' );
        if ( $is_item_preorder === 'Yes' ) {
            $item_date = $item->get_meta( '_pscf_item_preorder_date' );
            $formatted_date = pscf_format_indonesian_date( $item_date );
            $preorder_items[] = array(
                'name' => $item->get_name(),
                'date' => ! empty( $formatted_date ) ? $formatted_date : __( 'Hubungi Admin / TBA', 'perfume-store-custom-features' ),
            );
        }
    }
    
    if ( empty( $preorder_items ) ) {
        return;
    }
    
    if ( $plain_text ) {
        echo "\n========================================\n";
        echo esc_html__( 'INFORMASI PRE-ORDER', 'perfume-store-custom-features' ) . "\n";
        echo esc_html__( 'Pesanan Anda mengandung produk Pre-Order. Seluruh barang akan dikirimkan bersamaan setelah semua produk siap dikirim.', 'perfume-store-custom-features' ) . "\n\n";
        foreach ( $preorder_items as $item ) {
            echo "- " . esc_html( $item['name'] ) . ": Estimasi Ready " . esc_html( $item['date'] ) . "\n";
        }
        echo "========================================\n\n";
    } else {
        echo '</div>';
    }
}

/**
 * --------------------------------------------------------------------------
 * Feature 5: Warranty Claim & Refund Functions
 * --------------------------------------------------------------------------
 */

/**
 * Display the warranty claim form / status in Customer's View Order page
 */
function pscf_display_warranty_claim_form( $order ) {
    if ( ! $order ) {
        return;
    }
    
    // Only allow for Completed or Processing orders
    $status = $order->get_status();
    if ( ! in_array( $status, array( 'completed', 'processing' ) ) ) {
        return;
    }
    
    $order_id = $order->get_id();
    $claim_status = $order->get_meta( '_pscf_warranty_claim_status' );
    
    echo '<div class="pscf-warranty-claim-wrapper">';
    
    if ( ! empty( $claim_status ) ) {
        // A claim has already been submitted
        $reason = $order->get_meta( '_pscf_warranty_claim_reason' );
        $details = $order->get_meta( '_pscf_warranty_claim_details' );
        $date = $order->get_meta( '_pscf_warranty_claim_date' );
        $proof_id = $order->get_meta( '_pscf_warranty_claim_proof_attachment_id' );
        $proof_url = $proof_id ? wp_get_attachment_url( $proof_id ) : '';
        $admin_note = $order->get_meta( '_pscf_warranty_claim_admin_note' );
        
        $status_label = '';
        $status_class = '';
        if ( $claim_status === 'pending' ) {
            $status_label = __( 'Menunggu Tinjauan Admin', 'perfume-store-custom-features' );
            $status_class = 'pending';
        } elseif ( $claim_status === 'approved' ) {
            $status_label = __( 'Klaim Disetujui / Refund Diproses', 'perfume-store-custom-features' );
            $status_class = 'approved';
        } elseif ( $claim_status === 'rejected' ) {
            $status_label = __( 'Klaim Ditolak', 'perfume-store-custom-features' );
            $status_class = 'rejected';
        }
        
        echo '<div class="pscf-claim-status-box ' . esc_attr( $status_class ) . '">';
        echo '<h3>' . esc_html__( 'Status Klaim Garansi & Refund', 'perfume-store-custom-features' ) . '</h3>';
        echo '<p><strong>' . esc_html__( 'Status:', 'perfume-store-custom-features' ) . '</strong> <span class="pscf-status-badge ' . esc_attr( $status_class ) . '">' . esc_html( $status_label ) . '</span></p>';
        echo '<p><strong>' . esc_html__( 'Tanggal Pengajuan:', 'perfume-store-custom-features' ) . '</strong> ' . esc_html( $date ) . '</p>';
        echo '<p><strong>' . esc_html__( 'Alasan:', 'perfume-store-custom-features' ) . '</strong> ' . esc_html( $reason ) . '</p>';
        echo '<p><strong>' . esc_html__( 'Detail Masalah:', 'perfume-store-custom-features' ) . '</strong><br/>' . nl2br( esc_html( $details ) ) . '</p>';
        
        if ( $proof_url ) {
            echo '<p><strong>' . esc_html__( 'Bukti Fisik:', 'perfume-store-custom-features' ) . '</strong> <a href="' . esc_url( $proof_url ) . '" target="_blank" class="pscf-btn-view-proof">' . esc_html__( 'Lihat Bukti Terunggah 📄', 'perfume-store-custom-features' ) . '</a></p>';
        }
        
        if ( ! empty( $admin_note ) ) {
            echo '<div class="pscf-admin-claim-note">';
            echo '<strong>' . esc_html__( 'Catatan Admin:', 'perfume-store-custom-features' ) . '</strong><br/>';
            echo nl2br( esc_html( $admin_note ) );
            echo '</div>';
        }
        
        echo '</div>'; // pscf-claim-status-box
    } else {
        // Show submission form
        // Handle error display if redirect back with status
        if ( isset( $_GET['warranty_error'] ) ) {
            echo '<div class="pscf-msg error">' . esc_html( sanitize_text_field( urldecode( $_GET['warranty_error'] ) ) ) . '</div>';
        }
        
        echo '<button type="button" id="pscf_show_warranty_form_btn" class="button pscf-claim-btn">' . esc_html__( 'Ajukan Klaim Garansi / Pengembalian', 'perfume-store-custom-features' ) . '</button>';
        
        echo '<form id="pscf_warranty_claim_form" action="" method="POST" enctype="multipart/form-data" style="display: none; margin-top: 1.5em;" class="pscf-claim-form-box">';
        wp_nonce_field( 'pscf_submit_warranty_claim', 'pscf_warranty_nonce' );
        echo '<input type="hidden" name="pscf_order_id" value="' . esc_attr( $order_id ) . '" />';
        
        echo '<h3>' . esc_html__( 'Formulir Pengajuan Klaim Garansi / Refund', 'perfume-store-custom-features' ) . '</h3>';
        echo '<p class="pscf-form-intro">' . esc_html__( 'Jika pesanan Anda rusak/pecah di jalan, cacat, atau salah kirim, silakan lengkapi formulir di bawah ini beserta bukti foto/video.', 'perfume-store-custom-features' ) . '</p>';
        
        echo '<div class="pscf-form-row">';
        echo '<label for="pscf_claim_reason">' . esc_html__( 'Alasan Pengajuan *', 'perfume-store-custom-features' ) . '</label>';
        echo '<select id="pscf_claim_reason" name="pscf_claim_reason" required>';
        echo '<option value="">' . esc_html__( '-- Pilih Alasan --', 'perfume-store-custom-features' ) . '</option>';
        echo '<option value="Barang Pecah di Jalan">' . esc_html__( 'Barang Pecah di Jalan', 'perfume-store-custom-features' ) . '</option>';
        echo '<option value="Produk Cacat / Rusak">' . esc_html__( 'Produk Cacat / Rusak', 'perfume-store-custom-features' ) . '</option>';
        echo '<option value="Salah Kirim Varian">' . esc_html__( 'Salah Kirim Varian / Produk', 'perfume-store-custom-features' ) . '</option>';
        echo '<option value="Lainnya">' . esc_html__( 'Lainnya', 'perfume-store-custom-features' ) . '</option>';
        echo '</select>';
        echo '</div>';
        
        echo '<div class="pscf-form-row">';
        echo '<label for="pscf_claim_details">' . esc_html__( 'Detail Masalah *', 'perfume-store-custom-features' ) . '</label>';
        echo '<textarea id="pscf_claim_details" name="pscf_claim_details" rows="4" placeholder="' . esc_attr__( 'Jelaskan secara detail masalah barang Anda...', 'perfume-store-custom-features' ) . '" required></textarea>';
        echo '</div>';
        
        echo '<div class="pscf-form-row">';
        echo '<label for="pscf_claim_proof">' . esc_html__( 'Unggah Bukti Foto / Video (Maks. 5MB) *', 'perfume-store-custom-features' ) . '</label>';
        echo '<input type="file" id="pscf_claim_proof" name="pscf_claim_proof" accept="image/*,video/*" required />';
        echo '<span class="pscf-input-help">' . esc_html__( 'Format yang diterima: JPG, PNG, WEBP, MP4, MOV.', 'perfume-store-custom-features' ) . '</span>';
        echo '</div>';
        
        echo '<button type="submit" name="pscf_submit_warranty" class="button alt pscf-submit-btn">' . esc_html__( 'Kirim Pengajuan Klaim', 'perfume-store-custom-features' ) . '</button>';
        echo '</form>';
        
        // Simple inline toggle script
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#pscf_show_warranty_form_btn').on('click', function() {
                $(this).fadeOut(200, function() {
                    $('#pscf_warranty_claim_form').slideDown(300);
                });
            });
        });
        </script>
        <?php
    }
    
    echo '</div>'; // pscf-warranty-claim-wrapper
}

/**
 * Handle form submission of warranty claims
 */
function pscf_handle_warranty_claim_submission() {
    if ( ! isset( $_POST['pscf_submit_warranty'] ) ) {
        return;
    }
    
    if ( ! isset( $_POST['pscf_warranty_nonce'] ) || ! wp_verify_nonce( $_POST['pscf_warranty_nonce'], 'pscf_submit_warranty_claim' ) ) {
        wp_die( esc_html__( 'Keamanan tidak valid.', 'perfume-store-custom-features' ) );
    }
    
    $order_id = intval( $_POST['pscf_order_id'] );
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return;
    }
    
    // Check user permissions
    if ( ! current_user_can( 'edit_shop_orders' ) && get_current_user_id() !== $order->get_customer_id() ) {
        wp_die( esc_html__( 'Anda tidak memiliki akses ke pesanan ini.', 'perfume-store-custom-features' ) );
    }
    
    // Check if claim already submitted
    $existing = $order->get_meta( '_pscf_warranty_claim_status' );
    if ( ! empty( $existing ) ) {
        wp_die( esc_html__( 'Klaim sudah pernah diajukan untuk pesanan ini.', 'perfume-store-custom-features' ) );
    }
    
    $reason = sanitize_text_field( $_POST['pscf_claim_reason'] );
    $details = sanitize_textarea_field( $_POST['pscf_claim_details'] );
    
    if ( empty( $reason ) || empty( $details ) ) {
        $error_msg = urlencode( esc_html__( 'Harap isi semua kolom wajib.', 'perfume-store-custom-features' ) );
        wp_safe_redirect( add_query_arg( 'warranty_error', $error_msg, $order->get_view_order_url() ) );
        exit;
    }
    
    // Process upload
    if ( ! isset( $_FILES['pscf_claim_proof'] ) || $_FILES['pscf_claim_proof']['error'] !== UPLOAD_ERR_OK ) {
        $error_msg = urlencode( esc_html__( 'Gagal mengunggah file bukti. Silakan coba lagi.', 'perfume-store-custom-features' ) );
        wp_safe_redirect( add_query_arg( 'warranty_error', $error_msg, $order->get_view_order_url() ) );
        exit;
    }
    
    // Check file size (5MB max)
    $max_size = 5 * 1024 * 1024;
    if ( $_FILES['pscf_claim_proof']['size'] > $max_size ) {
        $error_msg = urlencode( esc_html__( 'Ukuran file terlalu besar. Maksimum 5MB.', 'perfume-store-custom-features' ) );
        wp_safe_redirect( add_query_arg( 'warranty_error', $error_msg, $order->get_view_order_url() ) );
        exit;
    }
    
    // Check file type
    $file_type = $_FILES['pscf_claim_proof']['type'];
    $allowed_types = array(
        'image/jpeg', 'image/png', 'image/webp', 'image/gif',
        'video/mp4', 'video/quicktime', 'video/x-matroska'
    );
    if ( ! in_array( $file_type, $allowed_types ) ) {
        $error_msg = urlencode( esc_html__( 'Format file tidak didukung. Harap unggah gambar atau video.', 'perfume-store-custom-features' ) );
        wp_safe_redirect( add_query_arg( 'warranty_error', $error_msg, $order->get_view_order_url() ) );
        exit;
    }
    
    // Include WordPress media logic
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    
    // Handle the upload securely
    $attachment_id = media_handle_upload( 'pscf_claim_proof', $order_id );
    if ( is_wp_error( $attachment_id ) ) {
        $error_msg = urlencode( esc_html__( 'Terjadi kesalahan saat memproses media: ', 'perfume-store-custom-features' ) . $attachment_id->get_error_message() );
        wp_safe_redirect( add_query_arg( 'warranty_error', $error_msg, $order->get_view_order_url() ) );
        exit;
    }
    
    // Save metadata
    $order->update_meta_data( '_pscf_warranty_claim_status', 'pending' );
    $order->update_meta_data( '_pscf_warranty_claim_reason', $reason );
    $order->update_meta_data( '_pscf_warranty_claim_details', $details );
    $order->update_meta_data( '_pscf_warranty_claim_proof_attachment_id', $attachment_id );
    $order->update_meta_data( '_pscf_warranty_claim_date', pscf_format_indonesian_date( date('Y-m-d') ) );
    $order->save();
    
    // Add Order Note
    $order->add_order_note( sprintf( __( 'Klaim Garansi & Refund diajukan oleh pelanggan. Alasan: %s.', 'perfume-store-custom-features' ), $reason ) );
    
    // Send email notification to Admin
    pscf_send_claim_email_to_admin( $order, $reason, $details, $attachment_id );
    
    // Redirect back to order details page
    wp_safe_redirect( remove_query_arg( 'warranty_error', $order->get_view_order_url() ) );
    exit;
}

/**
 * Send email notification about new claims to WordPress Administrator
 */
function pscf_send_claim_email_to_admin( $order, $reason, $details, $attachment_id ) {
    $to = get_option( 'admin_email' );
    $subject = sprintf( __( '[Klaim Baru #%s] Pengajuan Garansi / Refund', 'perfume-store-custom-features' ), $order->get_order_number() );
    
    $order_url = admin_url( 'post.php?post=' . $order->get_id() . '&action=edit' );
    if ( class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' ) && wc_get_container()->get( \Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled() ) {
        $order_url = admin_url( 'admin.php?page=wc-orders&action=edit&id=' . $order->get_id() );
    }
    
    $proof_url = wp_get_attachment_url( $attachment_id );
    
    $message = "Halo Admin,\n\n";
    $message .= "Ada pengajuan klaim garansi/refund baru untuk pesanan #" . $order->get_order_number() . ".\n\n";
    $message .= "Detail Pengajuan:\n";
    $message .= "----------------------------------------\n";
    $message .= "Alasan: " . $reason . "\n";
    $message .= "Tanggal: " . date('d F Y') . "\n";
    $message .= "Detail Masalah:\n" . $details . "\n";
    $message .= "----------------------------------------\n\n";
    $message .= "Bukti Foto/Video:\n" . $proof_url . "\n\n";
    $message .= "Silakan tinjau dan proses pengajuan klaim ini pada link di bawah:\n";
    $message .= $order_url . "\n\n";
    $message .= "Terima kasih,\nSistem Toko Parfum";
    
    wp_mail( $to, $subject, $message );
}

/**
 * Add Metabox to Edit Order admin screen
 */
function pscf_add_warranty_claim_metabox() {
    $screen = class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' ) && wc_get_container()->get( \Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled()
        ? 'woocommerce_page_wc-orders'
        : 'shop_order';
        
    add_meta_box(
        'pscf_warranty_claim_review',
        __( 'Review Klaim Garansi & Refund', 'perfume-store-custom-features' ),
        'pscf_render_warranty_claim_metabox',
        $screen,
        'side',
        'high'
    );
}

/**
 * Render the Metabox content
 */
function pscf_render_warranty_claim_metabox( $post_or_order ) {
    $order = ($post_or_order instanceof WP_Post) ? wc_get_order( $post_or_order->ID ) : $post_or_order;
    if ( ! $order ) {
        return;
    }
    
    $claim_status = $order->get_meta( '_pscf_warranty_claim_status' );
    if ( empty( $claim_status ) ) {
        echo '<p style="color:#777; font-style:italic; margin:0;">' . esc_html__( 'Tidak ada pengajuan klaim garansi pada pesanan ini.', 'perfume-store-custom-features' ) . '</p>';
        return;
    }
    
    $reason = $order->get_meta( '_pscf_warranty_claim_reason' );
    $details = $order->get_meta( '_pscf_warranty_claim_details' );
    $date = $order->get_meta( '_pscf_warranty_claim_date' );
    $proof_id = $order->get_meta( '_pscf_warranty_claim_proof_attachment_id' );
    $proof_url = $proof_id ? wp_get_attachment_url( $proof_id ) : '';
    $admin_note = $order->get_meta( '_pscf_warranty_claim_admin_note' );
    
    $status_label = '';
    $status_style = '';
    if ( $claim_status === 'pending' ) {
        $status_label = __( 'Menunggu Tinjauan', 'perfume-store-custom-features' );
        $status_style = 'background-color: #f0ad4e; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold;';
    } elseif ( $claim_status === 'approved' ) {
        $status_label = __( 'Disetujui', 'perfume-store-custom-features' );
        $status_style = 'background-color: #5cb85c; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold;';
    } elseif ( $claim_status === 'rejected' ) {
        $status_label = __( 'Ditolak', 'perfume-store-custom-features' );
        $status_style = 'background-color: #d9534f; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold;';
    }
    
    echo '<div class="pscf-admin-metabox-content" style="font-family: inherit; font-size: 13px; line-height: 1.5;">';
    echo '<p><strong>Status Klaim:</strong> <span style="' . esc_attr( $status_style ) . '">' . esc_html( $status_label ) . '</span></p>';
    echo '<p><strong>Tanggal Pengajuan:</strong> ' . esc_html( $date ) . '</p>';
    echo '<p><strong>Alasan:</strong> ' . esc_html( $reason ) . '</p>';
    echo '<p><strong>Deskripsi Masalah:</strong><br/><span style="background: #fdfdfd; border: 1px solid #ddd; padding: 6px; display: block; border-radius: 4px; max-height: 120px; overflow-y: auto; white-space: pre-wrap;">' . esc_html( $details ) . '</span></p>';
    
    if ( $proof_url ) {
        echo '<p><strong>Bukti Fisik:</strong><br/><a href="' . esc_url( $proof_url ) . '" target="_blank" class="button button-small" style="margin-top: 5px; display:inline-block;">📄 Buka Foto/Video Bukti</a></p>';
    }
    
    if ( $claim_status === 'pending' ) {
        echo '<hr style="border:none; border-top: 1px solid #eee; margin: 15px 0;" />';
        echo '<form method="POST" action="" onsubmit="return confirm(\'Anda yakin dengan keputusan ini?\');">';
        wp_nonce_field( 'pscf_admin_claim_action', 'pscf_admin_nonce' );
        echo '<input type="hidden" name="pscf_order_id" value="' . esc_attr( $order->get_id() ) . '" />';
        
        echo '<p><label for="pscf_admin_note"><strong>Catatan Review (Opsional):</strong></label>';
        echo '<textarea id="pscf_admin_note" name="pscf_admin_note" rows="3" style="width:100%; margin-top:5px;" placeholder="Tulis catatan persetujuan/penolakan untuk pelanggan..."></textarea></p>';
        
        echo '<div style="display:flex; gap:10px; margin-top:10px;">';
        echo '<button type="submit" name="pscf_admin_decision" value="approve" class="button button-primary" style="flex:1; background-color:#5cb85c; border-color:#4cae4c; color:#fff;">Setujui</button>';
        echo '<button type="submit" name="pscf_admin_decision" value="reject" class="button button-secondary" style="flex:1; background-color:#d9534f; border-color:#d43f3a; color:#fff;">Tolak</button>';
        echo '</div>';
        echo '</form>';
    } else {
        if ( ! empty( $admin_note ) ) {
            echo '<hr style="border:none; border-top: 1px solid #eee; margin: 15px 0;" />';
            echo '<p><strong>Catatan Admin:</strong><br/>' . nl2br( esc_html( $admin_note ) ) . '</p>';
        }
    }
    echo '</div>';
}

/**
 * Handle Admin claim decision input
 */
function pscf_handle_admin_warranty_decision() {
    if ( ! isset( $_POST['pscf_admin_decision'] ) ) {
        return;
    }
    
    if ( ! isset( $_POST['pscf_admin_nonce'] ) || ! wp_verify_nonce( $_POST['pscf_admin_nonce'], 'pscf_admin_claim_action' ) ) {
        wp_die( esc_html__( 'Keamanan tidak valid.', 'perfume-store-custom-features' ) );
    }
    
    if ( ! current_user_can( 'edit_shop_orders' ) ) {
        wp_die( esc_html__( 'Anda tidak memiliki hak untuk mengedit pesanan.', 'perfume-store-custom-features' ) );
    }
    
    $order_id = intval( $_POST['pscf_order_id'] );
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return;
    }
    
    $decision = sanitize_key( $_POST['pscf_admin_decision'] );
    $admin_note = sanitize_textarea_field( $_POST['pscf_admin_note'] );
    
    if ( $decision === 'approve' ) {
        $order->update_meta_data( '_pscf_warranty_claim_status', 'approved' );
        if ( ! empty( $admin_note ) ) {
            $order->update_meta_data( '_pscf_warranty_claim_admin_note', $admin_note );
        }
        $order->save();
        
        $note_text = __( 'Klaim Garansi & Refund disetujui oleh admin.', 'perfume-store-custom-features' );
        if ( ! empty( $admin_note ) ) {
            $note_text .= ' Catatan: ' . $admin_note;
        }
        $order->add_order_note( $note_text, 0, true );
        
        // Send email status update to customer
        pscf_send_claim_update_email_to_customer( $order, 'approved', $admin_note );
        
    } elseif ( $decision === 'reject' ) {
        $order->update_meta_data( '_pscf_warranty_claim_status', 'rejected' );
        if ( ! empty( $admin_note ) ) {
            $order->update_meta_data( '_pscf_warranty_claim_admin_note', $admin_note );
        }
        $order->save();
        
        $note_text = __( 'Klaim Garansi & Refund ditolak oleh admin.', 'perfume-store-custom-features' );
        if ( ! empty( $admin_note ) ) {
            $note_text .= ' Alasan penolakan: ' . $admin_note;
        }
        $order->add_order_note( $note_text, 0, true );
        
        // Send email status update to customer
        pscf_send_claim_update_email_to_customer( $order, 'rejected', $admin_note );
    }
    
    // Redirect back to order edit
    $redirect_url = admin_url( 'post.php?post=' . $order_id . '&action=edit' );
    if ( class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' ) && wc_get_container()->get( \Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled() ) {
        $redirect_url = admin_url( 'admin.php?page=wc-orders&action=edit&id=' . $order_id );
    }
    wp_safe_redirect( $redirect_url );
    exit;
}

/**
 * Send email status update to Customer
 */
function pscf_send_claim_update_email_to_customer( $order, $status, $admin_note ) {
    $to = $order->get_billing_email();
    if ( empty( $to ) ) {
        return;
    }
    
    $subject = sprintf( __( '[Update #%s] Hasil Klaim Garansi & Refund Anda', 'perfume-store-custom-features' ), $order->get_order_number() );
    $status_label = ($status === 'approved') ? 'DISETUJUI' : 'DITOLAK';
    
    $message = "Halo " . $order->get_billing_first_name() . ",\n\n";
    $message .= "Kami ingin mengabarkan hasil peninjauan klaim garansi/refund Anda untuk pesanan #" . $order->get_order_number() . ".\n\n";
    $message .= "Keputusan: " . $status_label . "\n\n";
    
    if ( ! empty( $admin_note ) ) {
        $message .= "Catatan dari Admin:\n";
        $message .= "----------------------------------------\n";
        $message .= $admin_note . "\n";
        $message .= "----------------------------------------\n\n";
    }
    
    if ( $status === 'approved' ) {
        $message .= "Tim kami akan memproses penukaran barang atau pengembalian dana Anda sesegera mungkin.\n\n";
    } else {
        $message .= "Jika Anda merasa keputusan ini keliru atau memiliki pertanyaan lebih lanjut, silakan hubungi tim CS kami.\n\n";
    }
    
    $message .= "Terima kasih,\nBoutique Perfume Store";
    
    wp_mail( $to, $subject, $message );
}

/**
 * Add Custom Columns to Orders list in Dashboard (claims tracking)
 */
function pscf_add_warranty_claim_order_column( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $column ) {
        $new_columns[ $key ] = $column;
        if ( 'order_status' === $key ) {
            $new_columns['pscf_warranty_claim'] = __( 'Klaim Garansi', 'perfume-store-custom-features' );
        }
    }
    return $new_columns;
}

/**
 * Populate claims column (Standard Posts Table)
 */
function pscf_populate_warranty_claim_order_column( $column, $post_id ) {
    if ( 'pscf_warranty_claim' === $column ) {
        $order = wc_get_order( $post_id );
        if ( ! $order ) return;
        
        $claim_status = $order->get_meta( '_pscf_warranty_claim_status' );
        
        if ( empty( $claim_status ) ) {
            echo '<span style="color: #bbb;">-</span>';
        } elseif ( $claim_status === 'pending' ) {
            echo '<span style="background-color: #f0ad4e; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em; display: inline-block;">⚠️ Pending</span>';
        } elseif ( $claim_status === 'approved' ) {
            echo '<span style="background-color: #5cb85c; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em; display: inline-block;">✓ Approved</span>';
        } elseif ( $claim_status === 'rejected' ) {
            echo '<span style="background-color: #d9534f; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em; display: inline-block;">✗ Rejected</span>';
        }
    }
}

/**
 * Populate claims column (HPOS Table)
 */
function pscf_populate_warranty_claim_order_column_hpos( $column, $order ) {
    if ( $order ) {
        pscf_populate_warranty_claim_order_column( $column, $order->get_id() );
    }
}

/**
 * Dynamically filter core/navigation block rendering on FSE themes
 * to inject My Account / Login links. This works even if FSE headers
 * are stored in the database!
 */
add_filter( 'render_block', 'pscf_add_my_account_link_to_nav_block', 10, 2 );

function pscf_add_my_account_link_to_nav_block( $block_content, $block ) {
    if ( isset( $block['blockName'] ) && 'core/navigation' === $block['blockName'] ) {
        // Only target the main header navigation menu
        $attrs = isset( $block['attrs'] ) ? $block['attrs'] : array();
        $class_name = isset( $attrs['className'] ) ? $attrs['className'] : '';
        
        // Check attributes or raw block HTML for the header menu class
        if ( strpos( $class_name, 'is-style-navigation-basic' ) === false && strpos( $block_content, 'is-style-navigation-basic' ) === false ) {
            return $block_content;
        }
        
        if ( strpos( $block_content, 'pscf-my-account-link' ) !== false ) {
            return $block_content;
        }
        
        $my_account_url = esc_url( wc_get_page_permalink( 'myaccount' ) );
        $label = is_user_logged_in() ? 'Akun Saya' : 'Login / Daftar';
        
        $new_item = '<li class="wp-block-navigation-item wp-block-navigation-link pscf-my-account-link">';
        $new_item .= '<a class="wp-block-navigation-item__content" href="' . $my_account_url . '">';
        $new_item .= '<span class="wp-block-navigation-item__label">' . $label . '</span>';
        $new_item .= '</a>';
        $new_item .= '</li>';
        
        if ( strpos( $block_content, '</ul>' ) !== false ) {
            $pattern = '/(<ul[^>]*class="[^"]*wp-block-navigation__container[^"]*"[^>]*>.*?)(<\/ul>)/is';
            if ( preg_match( $pattern, $block_content ) ) {
                $block_content = preg_replace( $pattern, '$1' . $new_item . '$2', $block_content );
            } else {
                $pos = strrpos( $block_content, '</ul>' );
                if ( $pos !== false ) {
                    $block_content = substr_replace( $block_content, $new_item . '</ul>', $pos, 5 );
                }
            }
        }
    }
    return $block_content;
}

/**
 * Filter WooCommerce account menu items to remove "downloads" tab
 */
function pscf_custom_account_menu_items( $items ) {
    if ( isset( $items['downloads'] ) ) {
        unset( $items['downloads'] );
    }
    return $items;
}

/**
 * Redirect direct access to the downloads endpoint to the main my-account page.
 */
function pscf_redirect_downloads_endpoint() {
    if ( is_account_page() && is_wc_endpoint_url( 'downloads' ) ) {
        wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
        exit;
    }
}

/**
 * Display interactive shortcut cards on the WooCommerce account dashboard page.
 */
function pscf_custom_dashboard_cards() {
    ?>
    <div class="pscf-dashboard-shortcuts">
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="pscf-shortcut-card">
            <h3>Pesanan Saya</h3>
            <p>Lihat riwayat belanja, status pengiriman, dan ajukan klaim garansi.</p>
            <span class="pscf-shortcut-link">Lihat Pesanan &rarr;</span>
        </a>
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="pscf-shortcut-card">
            <h3>Alamat Pengiriman</h3>
            <p>Atur alamat penagihan dan alamat pengiriman pesanan Anda.</p>
            <span class="pscf-shortcut-link">Kelola Alamat &rarr;</span>
        </a>
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="pscf-shortcut-card">
            <h3>Detail Akun</h3>
            <p>Perbarui profil, ubah kata sandi, dan kelola info masuk akun Anda.</p>
            <span class="pscf-shortcut-link">Ubah Profil &rarr;</span>
        </a>
    </div>
    <?php
}

// ----------------------------------------------------
// Feature 6: Custom Post Type FAQ (Admin Manageable)
// ----------------------------------------------------
add_action( 'init', 'pscf_register_faq_cpt' );
function pscf_register_faq_cpt() {
    $labels = array(
        'name'                  => _x( 'FAQs', 'Post type general name', 'perfume-store-custom-features' ),
        'singular_name'         => _x( 'FAQ', 'Post type singular name', 'perfume-store-custom-features' ),
        'menu_name'             => _x( 'FAQs', 'Admin Menu text', 'perfume-store-custom-features' ),
        'name_admin_bar'        => _x( 'FAQ', 'Add New on Toolbar', 'perfume-store-custom-features' ),
        'add_new'               => __( 'Add New', 'perfume-store-custom-features' ),
        'add_new_item'          => __( 'Add New FAQ', 'perfume-store-custom-features' ),
        'new_item'              => __( 'New FAQ', 'perfume-store-custom-features' ),
        'edit_item'             => __( 'Edit FAQ', 'perfume-store-custom-features' ),
        'view_item'             => __( 'View FAQ', 'perfume-store-custom-features' ),
        'all_items'             => __( 'All FAQs', 'perfume-store-custom-features' ),
        'search_items'          => __( 'Search FAQs', 'perfume-store-custom-features' ),
        'not_found'             => __( 'No FAQs found.', 'perfume-store-custom-features' ),
        'not_found_in_trash'    => __( 'No FAQs found in Trash.', 'perfume-store-custom-features' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => array( 'title', 'editor' )
    );

    register_post_type( 'faq', $args );
}

add_action( 'init', 'pscf_create_default_faqs', 20 );
function pscf_create_default_faqs() {
    if ( post_type_exists( 'faq' ) ) {
        // Only run if no FAQs exist in DB
        $count = wp_count_posts( 'faq' );
        if ( isset( $count->publish ) && (int) $count->publish === 0 ) {
            $defaults = array(
                array(
                    'title' => 'Apakah parfum yang dijual original?',
                    'content' => 'Ya, semua produk parfum di toko kami dijamin 100% original lengkap dengan boks asli atau botol decant steril langsung dari distributor resmi.'
                ),
                array(
                    'title' => 'Berapa lama daya tahan wangi parfum?',
                    'content' => 'Daya tahan wangi bervariasi antara 6 hingga 12 jam tergantung pada jenis konsentrasi parfum (EDT/EDP), wewangian dasar yang digunakan (Base Notes), serta tingkat aktivitas harian Anda.'
                ),
                array(
                    'title' => 'Bagaimana sistem Pre-Order bekerja?',
                    'content' => 'Untuk produk Pre-Order, Anda dapat melakukan pemesanan terlebih dahulu dan pesanan akan ditahan (On Hold) hingga stok siap dikirimkan sesuai dengan estimasi tanggal ready.'
                ),
                array(
                    'title' => 'Apakah ada garansi jika botol pecah di jalan?',
                    'content' => 'Ya! Kami memiliki layanan garansi klaim pecah. Anda cukup membuka detail pesanan di akun Anda dan mengirimkan bukti foto/video unboxing melalui form klaim garansi yang tersedia.'
                ),
                array(
                    'title' => 'Bagaimana cara mendapatkan Tester Gratis?',
                    'content' => 'Setiap pembelanjaan minimal Rp 500.000, Anda berhak memilih 1x sampel tester parfum gratis ukuran 2ml langsung di halaman Checkout.'
                )
            );
            
            foreach ( $defaults as $faq ) {
                wp_insert_post( array(
                    'post_title'   => $faq['title'],
                    'post_content' => $faq['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'faq'
                ) );
            }
        }
    }
}

/**
 * Render dynamic floating cart button in footer
 */
function pscf_render_floating_cart() {
    if ( is_admin() ) {
        return;
    }
    $count = ( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
    $active_class = ( $count > 0 ) ? 'active' : '';
    ?>
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="pscf-floating-cart <?php echo $active_class; ?>">
        <span class="pscf-floating-cart-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </span>
        <span class="pscf-floating-cart-count"><?php echo $count; ?></span>
    </a>
    <?php
}

/**
 * Update floating cart HTML fragment via WooCommerce AJAX
 */
function pscf_add_to_cart_fragments( $fragments ) {
    ob_start();
    $count = ( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
    $active_class = ( $count > 0 ) ? 'active' : '';
    ?>
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="pscf-floating-cart <?php echo $active_class; ?>">
        <span class="pscf-floating-cart-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </span>
        <span class="pscf-floating-cart-count"><?php echo $count; ?></span>
    </a>
    <?php
    $fragments['a.pscf-floating-cart'] = ob_get_clean();
    return $fragments;
}

/**
 * Intercept /layanan/ page and render hardcoded template
 */
function pscf_render_hardcoded_layanan_page() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $path = parse_url( $request_uri, PHP_URL_PATH );
    
    // Strip subfolder if WordPress is installed in a subfolder (e.g. /wordpress/)
    $site_path = parse_url( home_url(), PHP_URL_PATH );
    if ( $site_path ) {
        if ( strpos( $path, $site_path ) === 0 ) {
            $path = substr( $path, strlen( $site_path ) );
        }
    }
    $path = trim( $path, '/' );
    
    if ( $path === 'layanan' || $path === 'services' ) {
        $template = plugin_dir_path( __FILE__ ) . 'templates/page-layanan.php';
        if ( file_exists( $template ) ) {
            // Status code 200 OK
            status_header( 200 );
            include $template;
            exit;
        }
    }
}







