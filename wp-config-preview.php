<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'taichinh_georgia');

/** MySQL database username */
define('DB_USER', 'taichinh_georgia');

/** MySQL database password */
define('DB_PASSWORD', 'b0T6{{lHEWZM');

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
define('AUTH_KEY',         'W)pcJ1GEMndAxN?_q}lD#0rlpT3|P0^vR8[H|4UlHcI~yCB;JT-K.X|At@D}(njK');
define('SECURE_AUTH_KEY',  'a`;!9TZ;?u-t*OZuOi/V8)H#EzeRVBc(~qa,-&K!3O/2O|QrJWa!n^7)iQ|}ThP~');
define('LOGGED_IN_KEY',    '(]o ?R==Nw}sgomv.1Kl%xH@0G2H_(5gI$o#&S CFjG4hT*5vpCjcjU|XPMM^A9r');
define('NONCE_KEY',        'ZqIC$u]95/grHo<BC*}p-.o/?AuA;=l.N=GaVg1bKxTc,`7b6K`D~X5BGzpqHrDx');
define('AUTH_SALT',        '_PeP0sD12wYjO]]Ag+hj(M]`TE}V`0<Y>/@v|l`6U2>S!<N09MEHg.o9-;*fV|[L');
define('SECURE_AUTH_SALT', ',HiE`F-{IPIx8h-[Y}?{W8e&b|%o)]XR6(Dm0csY/V+GFVG30MO;pj?&Kg<Q+</Z');
define('LOGGED_IN_SALT',   'w[M#>/|M;($74N1SIRpNC0v#3Nk8R.fmaJ k_(B3J;hH~+{c- T9)7bfRf]38AK4');
define('NONCE_SALT',       'QmS^eCRFV>L%?K~L8y|5rbsvqu./ w&mJ/J+*^kZ0&y9ltQBi5Cr!(+)Xa0,Pzu|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


define('WP_HOME','http://georgia.taichinh-24h.com/');
define('WP_SITEURL','http://georgia.taichinh-24h.com/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
