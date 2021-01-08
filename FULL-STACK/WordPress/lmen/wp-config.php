<?php
define('WP_CACHE', false); // Added by WP Rocket
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lmen');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_AUTO_UPDATE_CORE', false );

define('WP_SITEURL', 'http://localhost/LTW/FULL-STACK/WordPress/lmen'); 
define('WP_HOME', 'http://localhost/LTW/FULL-STACK/WordPress/lmen'); 

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{nVe(EjA?at6P<I?MtKm>)j/E]7`R|L;_r|.(#Eq`Wl 2yLo!5zJcvH#cFOOY1b1');
define('SECURE_AUTH_KEY',  'B(jbgI4y>dnQu&1](}F+UG]+yGzznsO3}r#1podEH]Rb78TM|W#7@~ky(0bI05cj');
define('LOGGED_IN_KEY',    '7*:zMhr4l|69>)t%b.oS?53RY>:7y_rx5rsw:q^/&840<4%S>XPP63%Y]PL@eM=7');
define('NONCE_KEY',        '#a8GQ+pX`aZMnxF}~avkUIeD.N>3,8.|. Z>.lmz{jW{sc1I=yn/?|#|Rq@naDi.');
define('AUTH_SALT',        ']y6SJSq1)Sjqd=H,4_mnvIC0g~912>QwRHnf4P.M7pj7qMGy8c*,:EQi:)&V C>E');
define('SECURE_AUTH_SALT', 'hLlvg6pY}Xq1ine1QW5HO;]2AA<f5Mq*XwH^k]&W.$QVa8R#3qPeRYy1yWtTTH~-');
define('LOGGED_IN_SALT',   '&9O*P.+T5SJw<{N<RwHd!o[5R6DJs/E?td}j;/;*vK>;xxi%wW.q3&*5r3)Vq_ix');
define('NONCE_SALT',       'gyJkl;0m}hQk#ag0W)|gOmrRHxJnlPoI6^R<)mFE{`Q.a1Yv>{Jeub@i|a$bdl^h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rt_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
