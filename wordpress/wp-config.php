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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'E:\wordpress\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'wordpressDB' );

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
define( 'AUTH_KEY',         '- 4{h-Z:S`3.WYxp~)-t*zT#~zp;6k,wxNNOb&5>=l)vmq#!K,N_(4;fufgaa;U9' );
define( 'SECURE_AUTH_KEY',  'Ez{~OaS{@)xl|=oYjavX9J0NY1.nGPdY] 0ltGfq_9,)N$cIIcDNOL30EHZ<me2(' );
define( 'LOGGED_IN_KEY',    '>lg$KX6sL42bF_gT]AtqfBKd*ItNYG<cQ:DD+sKq;5c39h#QLTV?%[Iv9EHHfF*:' );
define( 'NONCE_KEY',        '@0YfbMUimIfp]a|E5l,!E7sLs*V_&m:0{i/NJPTHuV49u2 wz|V/r/M4G_:cCiH ' );
define( 'AUTH_SALT',        's~`);IjnTW~S<E-8_+|peij2WISgIg8Ds0ANVR1v<A@EC7wX[Q<qN)8.nr 7myK=' );
define( 'SECURE_AUTH_SALT', 'ul_3iazWF I&@U~f!Bt43OE xj{hLWOlqPE-IM3=(}F/BZ(sHG <@GRWJ-q?_y$_' );
define( 'LOGGED_IN_SALT',   'c2Ws /5jo.6#zlgqpBI?7,PP0rh/{%j!NWPpzQ5.VHs! f&pqivJEi~r>7&^7>Le' );
define( 'NONCE_SALT',       'gq6_V]]T~EKhnr#1,8S!~en|1}c3k05@#+%G<Z4ttJcYvKbC5;,6``qD|rM^H&T-' );

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
