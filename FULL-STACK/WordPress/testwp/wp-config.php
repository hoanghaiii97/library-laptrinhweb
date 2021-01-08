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
define( 'DB_NAME', 'testwp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ')4s]B:jLM$>a<|<dyID`,Iq7:7S88ULpt:9IK1`gCXzA[KG5ZnSG%uHE)+D`d:K]' );
define( 'SECURE_AUTH_KEY',  'yYW.@XBMJm~_q{jrB5c;L6p<->e:#0uCs`c+A]7ll,SIW]R1F2G>5o8PMXxcc_Ri' );
define( 'LOGGED_IN_KEY',    'q+U%dqf-Ot+WLij#ztfVe|0mJ|Ktc,!gh.#o6~D3wy]{V2@78 SIlBl1&zp_]`6i' );
define( 'NONCE_KEY',        '_!0F1~K&gmbb:7H=O_TO$(,rwF0#x)]]NQ6?$@>hDCQ>r8`h(iTNO@2MiUu_Vd~b' );
define( 'AUTH_SALT',        'r(>yf~9;!,9/idoj)Fw~t-mGBH0xy5]zEv$;`B)ca+Q1y=^y%C8t] c)G:KEu4 [' );
define( 'SECURE_AUTH_SALT', ')d3X3.;l4aCv(9*iT|#=+BJMk1oL.U70w@UqiQfLHXf>JqZPL~8C|cdYLP0F~:9Z' );
define( 'LOGGED_IN_SALT',   'Snuv!Q..vLA[7|e~^XI+KHE#g>#f@#v/YqW7!C@3/V7G;nsS<z%;/Y)>l?{;S.vS' );
define( 'NONCE_SALT',       '3>XUBxT_Q{mX<Hf<b*=z9Zq47L;t~Cd-immFm<#Ndh%v&Z#$eb}P~YdyRFw6/D$F' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
