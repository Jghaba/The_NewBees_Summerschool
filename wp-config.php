<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'chss_newbees' );

/** MySQL database username */
define( 'DB_USER', 'chss_newbees' );

/** MySQL database password */
define( 'DB_PASSWORD', 'd0fHRaiBNe1kY5PR' );

/** MySQL hostname */
define( 'DB_HOST', 'manolegeorge.ga' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%B{i.@KWo;0sNia0bOQG/UNj<G@YyzW#/QakZTP]O3 >`)/@Vn!`cSD7ml<le3bm' );
define( 'SECURE_AUTH_KEY',  '[eUfQ+vIQw3A:pG$VfGlww,4gMU[*$[kO($hhU)?lsvCVP$y4xl0iUkZx}%+eu|>' );
define( 'LOGGED_IN_KEY',    'bvt0:(1<jJ.fG,_.)6`czbXo^##Y`y`NgY3*DbLn[5f<aC-Jle$iS^LRbD2Bu|%s' );
define( 'NONCE_KEY',        '%XAW`xHVE2H{?GtB5SIYi2MZ^kR2UAGx7`Bvb=|Z%!/U?OKW:t$F$:`>j.]2(#q-' );
define( 'AUTH_SALT',        '-<Scbdo9>`G:+]c[v-?`M}9gz$l/aEjs)Ya-tgWo&S;e 4cki2 Bs,;5uGX2Zm4W' );
define( 'SECURE_AUTH_SALT', ';|S}We^x8/%l&w(N):<3d7>bIIn[PE%-*FCp2$ ?S>3~(Kv8Gr-s&-?Zh[$7Z|- ' );
define( 'LOGGED_IN_SALT',   'iD:@wePMU-h<Smvoz <>@A/pTLs4`nPC*(3yeGV?s$UZ!FB6+yHd!rC(hz1lCdUP' );
define( 'NONCE_SALT',       'R@T>+-h0pG!ag|^ m3{f> $%35#72sj<1S5g86ffy15+a!8Ef,<RVFv b!W&HOqT' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
