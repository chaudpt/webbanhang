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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webbanhang_wp' );

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
define( 'AUTH_KEY',         '#%fJ{a|rp1cy}TVp^F(.E9?6iLmglHSm0 ?iTDac[gbuIcIF48)up:PrXrR:yOI>' );
define( 'SECURE_AUTH_KEY',  '[uw#i^9#z`=PKK4+WQZ.}Ik5v^q7RUP2k8H%oIZ6;4~&pp}6*~bgUA]g(}3`<+eC' );
define( 'LOGGED_IN_KEY',    '9/!HFFsJ*[ $fbD0Z{4r7xF=u19X]<wkX(s^x#@8<GJ~;=yLkZjeHUNefzp9!szA' );
define( 'NONCE_KEY',        'Aa}={}6F~@uZ{*&shX~RG|QwyPaqt;s#XHur~(H:0l#[%.WlBT4F0{XmN7Cl(P6G' );
define( 'AUTH_SALT',        'a0zS<bqHaEIPRM2%2Iy&<;GfC]e?tq/Q-{-BIEy[y~a4g-z;LOg<[,SC;`Q3_Gd1' );
define( 'SECURE_AUTH_SALT', '!Z:Qq*s>|5,sK;:4-].*zB0n=SH|vy,]?/mYGF8Zu<ossHT%d0;P/]M|(cbjsc~7' );
define( 'LOGGED_IN_SALT',   ':8/ab$_S!3j%*7Uh`N:oJ)v%?3hQHh?uJ5IR]uUmpY;5>WszTVw7`_X80W:+k/{+' );
define( 'NONCE_SALT',       'iG.Hn.Rxtm :dyzU:bl6cl3xic-;zo4DV.]24KEW5qs;XG}>ZA<U_a tp{v.^L;r' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
