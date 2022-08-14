<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'lqUVqU5T;+r/OP3XjOlr9%/Bjn/`KEQ,X|!Y(lC(%hi:Sj.`*5boo[ASq8EQ],_C' );
define( 'SECURE_AUTH_KEY',  'Rv*v-mis*`F8{OJBDr.n^}Oi*lcxv/ATZ<bw1eq~L1DJ|5(0aa4[KuHr(-X`7]8R' );
define( 'LOGGED_IN_KEY',    'kHs!7^cJc`](h>4UAV^z{ .|P$hKIeJ}5Ek-.=K;?O5Ut_Qco1Se-=o*GlCs3IZV' );
define( 'NONCE_KEY',        '4a~3tM5-6p7oG{D^vj~D6TI[~]^/.NWC}:h{+Ow~SBuwNW+7o%st&>p|]A#cFuE<' );
define( 'AUTH_SALT',        '`J<GtZ,TFqi2ro;/$MzAjZwy1<)?t7eQ7tG5MF|y+JZ n8<u46{mb{16sUgt&wP/' );
define( 'SECURE_AUTH_SALT', 'kkIU(a9Y/.X@4KcI-_`o!VE;&cJNQ7&yBjALy]NZwSDx-{jCj45|s6B)QO04S42u' );
define( 'LOGGED_IN_SALT',   ')v5lU4D98`pAH}+RA_}>(@$Rg[FFQrFLz,DnINPp`~FP7$-n.w[.P12uYeB*e`2#' );
define( 'NONCE_SALT',       'S[&M6;%J(d~VyWNY$bq.i3PF.$a)Qa?wy3?#Sc+[l_,0I_QL0KuCRtqg<9wa|7V4' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
