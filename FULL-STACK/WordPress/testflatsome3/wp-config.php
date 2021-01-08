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
define( 'DB_NAME', 'testflatsome3' );

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
define( 'AUTH_KEY',         'u!Ohy7vUvf|OzWIt7Y&.)pmbJb}er(g+f8dIln,M]XVp[n;VW>=s~.vw,m2rm(Zv' );
define( 'SECURE_AUTH_KEY',  ';<P&EJjODX+_u]#e^`O2 sVlZ824k_}6_?hMNKxr$3m|:1q$vV:t:!*wT69$y633' );
define( 'LOGGED_IN_KEY',    'a=V<U(&$`HolA ^{kq!kae@BhZUWh#M:D!3=KhjBp2^UViHzaA8(<bYv{:Y1dTPg' );
define( 'NONCE_KEY',        'Kd9f]@-+UJIL!la/JA(l:w:{dt<AcK$v!S6<E6U.AO; 0(3`w=k=KjTH&V%LH*D@' );
define( 'AUTH_SALT',        'o3t/4*e6Ib*1cEZ9wKDJ/`9d<V;:G6a@^:IHwBuUu6A$OM+<RuY;oC fut4J/.;z' );
define( 'SECURE_AUTH_SALT', 'BYnI<3#~>-4u+rH[Y*w9o=bx^gIUCe*i@=`{O0x3IM3fsD~m;c4kRYLd(iMbN5/6' );
define( 'LOGGED_IN_SALT',   '}5mW(LN_z.0_h1jKuc1Q7>i .O|Sao_Um:!L|~T,|.Ohom_E;Fql.[w_IBftv_PX' );
define( 'NONCE_SALT',       ']%-[XdpjkxiJN<Oo&367#0q(+JfWU2E69WfuvsXI4S3/}uX?8v,$hE{lnp #PQEO' );

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
