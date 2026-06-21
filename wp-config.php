<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_parfume' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9YYyyu A?Qj1&;Gqi8z^Zs1cU0^)?,!RQ|Apt/5 Eu=0[$XWeN0J.emH ZII$4zK' );
define( 'SECURE_AUTH_KEY',  's(n&UekD M2=^r.xKmZ#SvHw K.RJUa8alLD4$b4~-^n6?Vh))&-zrY;hrj`GenV' );
define( 'LOGGED_IN_KEY',    'TN=(}F _(b$86$D,LE<Nw z{w4+`~7XdHF(9BN)F{?`gI/,W]<`$~zP8sG[k2Wf3' );
define( 'NONCE_KEY',        'c=yAP[!Qd`P;[r[FLfI.FzD3T~i=V=_A4G2Diy[?R=.eOd@:/~/NS!{!T-/c[>/)' );
define( 'AUTH_SALT',        'E;~F_,1rPv|/1lHyU=K{!M?0,g,6(d)|aEof rC.W2-DaO:/!U+2@`30.RKq$|ZK' );
define( 'SECURE_AUTH_SALT', '1(x5RrbO>W^%y(}$|RQt{H{j,Jb7bCYD4y$5cBFWx7t{GH7HJ$Qw{k`{(r)v9&EC' );
define( 'LOGGED_IN_SALT',   'RP)XeCqThSoAP/WwH&w}WA>qMX$9^/E=]oI^eb>>~TE^-D5r?H{j^n~&fXJ)#.Xm' );
define( 'NONCE_SALT',       ']+3k_N9GQT935Rb&O+Zzm:@9YZG*$D5?IzX7o%-.z~aK`YKVm9G_Gt<pR%~Bu:Le' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

// Auto-detect URL: pakai domain sesuai Host yang sedang diakses
$_host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'] ?? 'parfume.local';

if ( strpos( $_host, 'bellonime.site' ) !== false ) {
    // Akses via cloudflared tunnel (production)
    define( 'WP_HOME',    'https://parfume.bellonime.site' );
    define( 'WP_SITEURL', 'https://parfume.bellonime.site' );
    // Force HTTPS karena cloudflared forward sebagai HTTPS
    if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        $_SERVER['HTTPS'] = 'on';
    }
    if ( ! isset( $_SERVER['HTTPS'] ) || $_SERVER['HTTPS'] !== 'on' ) {
        $_SERVER['HTTPS'] = 'on';
        $_SERVER['SERVER_PORT'] = '443';
    }
} else {
    // Akses lokal
    $subfolder = ( strpos( $_host, 'localhost' ) !== false || strpos( $_host, '127.0.0.1' ) !== false ) ? '/wordpress' : '';
    define( 'WP_HOME',    'http://' . $_host . $subfolder );
    define( 'WP_SITEURL', 'http://' . $_host . $subfolder );
}



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
