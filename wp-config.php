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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'folio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%${#P(j3s59E9[t<=_=i4wZbUy>vG!unhgt-%%XjkzKd2:HMzCio 9};jv^Mm/ik');
define('SECURE_AUTH_KEY',  'g1_Y(UX<G{vOo~M}j729f,e`V=)g@sC|(KOpV#Pc7q{Lq}vx3L`M9V29/Txg,;(/');
define('LOGGED_IN_KEY',    'ag` +3^%$([>2z*;#@BcJjzKF1H$r}qzm1ktg%+6`nm,yJi$s{W~^?a-J~@a<K+G');
define('NONCE_KEY',        'f8D;|PVBRIsL>iA_gsKe;3Dbg(3nZy<@4<OKy@?XxF_^T`&UH3>VIHB}A<S4>[Xb');
define('AUTH_SALT',        'wNFy?{AIr_U>:AN%D5toCH{$g_|~w7_iTQ_:&,(NCH(4f+a)#$z#,t!gO@Jo0RLz');
define('SECURE_AUTH_SALT', '2%grla/AR|,ne.ar ~c@uA4jzu&JgJ]qoD-Z3BMqGF!B4RIexpn,g:_I`W.Wil@:');
define('LOGGED_IN_SALT',   't7k~B=g[?dQ71+q+U`UD-|c{}wT~wrE-A#t}Z]mNOY>$L/-vA]HUq~Y_YqtLzVU)');
define('NONCE_SALT',       'q.((#mN|ceD#GAHLXe 8S^./6>bIK<f0il#^MUPAVW-+[y,n>3rMNxU2za?B xEk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
