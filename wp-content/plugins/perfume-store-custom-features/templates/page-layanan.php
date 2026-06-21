<?php
/**
 * Template Name: Layanan (Hardcoded)
 * Description: Custom hardcoded template for the Services page of the Perfume Store.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'pscf-services-template-page' ); ?>>
<?php wp_body_open(); ?>

<div class="wp-site-blocks">
    <?php
    // Render the FSE Theme Header
    echo do_blocks( '<!-- wp:template-part {"slug":"header","theme":"perfume-store-fse","area":"header"} /-->' );
    ?>

    <main class="pscf-services-container">
        <!-- Hero Section -->
        <header class="pscf-services-hero">
            <div class="pscf-services-hero-content">
                <span class="pscf-services-tag">EXQUISITE SERVICES</span>
                <h1 class="pscf-services-title">Layanan Eksklusif Kami</h1>
                <p class="pscf-services-subtitle">Kami menghadirkan pengalaman berbelanja parfum mewah terbaik dengan berbagai layanan khusus untuk menjamin kepuasan penuh Anda.</p>
            </div>
        </header>

        <!-- Services Grid -->
        <section class="pscf-services-grid">
            <!-- Service 1: Decant & Tester -->
            <div class="pscf-service-card">
                <div class="pscf-service-icon-box">
                    <span class="pscf-service-icon">✨</span>
                </div>
                <h2 class="pscf-service-card-title">Decant & Tester Gratis</h2>
                <p class="pscf-service-card-desc">Belanja minimal Rp 500.000 untuk mendapatkan sampel decant parfum 2ml gratis pilihan Anda. Coba keharuman aslinya langsung di kulit Anda sebelum membeli botol penuh.</p>
                <div class="pscf-service-card-footer">
                    <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="pscf-service-link">Belanja Sekarang &rarr;</a>
                </div>
            </div>

            <!-- Service 2: Gift Wrapping -->
            <div class="pscf-service-card">
                <div class="pscf-service-icon-box">
                    <span class="pscf-service-icon">🎁</span>
                </div>
                <h2 class="pscf-service-card-title">Bungkus Kado Premium</h2>
                <p class="pscf-service-card-desc">Kirimkan keharuman mewah sebagai hadiah spesial. Dapatkan kemasan kado eksklusif lengkap dengan kartu ucapan kustom langsung saat checkout hanya dengan tambahan Rp 15.000.</p>
                <div class="pscf-service-card-footer">
                    <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="pscf-service-link">Pilih Kado &rarr;</a>
                </div>
            </div>

            <!-- Service 3: Warranty Claim & Refund -->
            <div class="pscf-service-card">
                <div class="pscf-service-icon-box">
                    <span class="pscf-service-icon">🛡️</span>
                </div>
                <h2 class="pscf-service-card-title">Garansi & Refund Cepat</h2>
                <p class="pscf-service-card-desc">Jaminan keamanan penuh untuk Anda. Botol pecah atau salah aroma saat pengiriman? Ajukan klaim garansi dengan mudah langsung dari dashboard akun Anda untuk ganti baru atau refund cepat.</p>
                <div class="pscf-service-card-footer">
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="pscf-service-link">Klaim Garansi &rarr;</a>
                </div>
            </div>

            <!-- Service 4: Pre-Order Exclusive -->
            <div class="pscf-service-card">
                <div class="pscf-service-icon-box">
                    <span class="pscf-service-icon">📅</span>
                </div>
                <h2 class="pscf-service-card-title">Pre-Order Edisi Terbatas</h2>
                <p class="pscf-service-card-desc">Jangan lewatkan koleksi parfum mewah impor dan edisi terbatas. Pesan lebih awal melalui sistem Pre-Order terintegrasi kami dengan estimasi tanggal kedatangan yang transparan.</p>
                <div class="pscf-service-card-footer">
                    <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="pscf-service-link">Lihat Pre-Order &rarr;</a>
                </div>
            </div>
        </section>
        
        <!-- Bottom Banner Section -->
        <section class="pscf-services-bottom-banner">
            <div class="pscf-banner-content">
                <h2>Butuh Bantuan Memilih Karakter Aroma Anda?</h2>
                <p>Tim ahli parfum kami siap membantu Anda menemukan karakter wewangian yang paling mengekspresikan diri Anda melalui konsultasi personal secara langsung.</p>
                <a href="https://wa.me/628123456789" class="pscf-banner-button" target="_blank">Konsultasi via WhatsApp</a>
            </div>
        </section>
    </main>

    <?php
    // Render the FSE Theme Footer
    echo do_blocks( '<!-- wp:template-part {"slug":"footer","theme":"perfume-store-fse","area":"footer"} /-->' );
    ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
