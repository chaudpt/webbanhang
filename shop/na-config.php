<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u446039828_webbanhang' );

/** Database username */
define( 'DB_USER', 'u446039828_sales' );

/** Database password */
define( 'DB_PASSWORD', 'Thienchau:312' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'R#Q_cC<0xR5X`$:+rn :!VO0qr]D`r%Z(?Ms_x*#7>4S=^a;S(x1$<y;j1r1S0.E' );
define( 'SECURE_AUTH_KEY',   '*fl>.i0eCRlT8ch[:%0]C(jBDNuIb=DaZB(PM[TBlx:[.5:1vrqVCG5Lop3f]4I|' );
define( 'LOGGED_IN_KEY',     '1mc1`FQgYL(>G8u+qE#P(N2s]i:o&0eo^_@>ry2}D[Y0qj;<VBv9Z{2E7XYpv,!k' );
define( 'NONCE_KEY',         '88au59VG~lcRz.>cS0O($Tn<?*!l)}c<YA m{DvH#kr%HUv]/Q>X<%w`!P&N?Prv' );
define( 'AUTH_SALT',         '^-uZ>zCZw2K~zrt,5zxK:& K-%:3Hxa?7J7h!dB|X5zWt6Gv JU3,>o[TysT{{&*' );
define( 'SECURE_AUTH_SALT',  '9S@Ww} 6(w^Hw1po`tydXd^&AtfF(ghy+RlbzZ^4(@8VR^<v|zGDG6rW)l2IcYy{' );
define( 'LOGGED_IN_SALT',    'sES|UzZubRGVuh5H;>8xGrU}wx$Ntnc{i<c};iSpKR4V885|ifM[/..6%>yA2$.L' );
define( 'NONCE_SALT',        '|i-~TrG^gv5-<RqQqu 6}gd|0RAkA2 q2[*MRI$<+=mZokGb%6%2|)@i7#r ;5>c' );
define( 'WP_CACHE_KEY_SALT', 'S;7%kgFOger0_ 6&}uP?xW/@>(:.-@@+4+2!d! ,mUCa;o*c<:bo9o,::]* h(=_' );
$table_prefix = 'wp_';
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'fa8c5cfc37b4112b4533d457202c6c0e' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'na-settings.php';
