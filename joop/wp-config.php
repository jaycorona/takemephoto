<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'takemephoto');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}hHm9O16j7wx4P;~V.&DC|2j*zC%Uk@i=-1Sq .uV Wa3&63-HlALF/wA<>Y;EzL');
define('SECURE_AUTH_KEY',  'yaEb6kz[z/3-c1(Y-J:d,WQ?^_.v]n@9A)-n[<Ai:Mq]V;o?K*-<x,t7A@n_4=;4');
define('LOGGED_IN_KEY',    'hVO$d)Qt9hquW8E5T?7v.k{r&Qe~y|:$E$kZt0i*;U6<Lu`f.b]N7wM^o.=OPWw~');
define('NONCE_KEY',        '-0nn<o50k<k<b0m~|wDZOV}Bj#)4(mtkxOY4j7-2 T-jK]^|kBWe!:}+F%:OW#fT');
define('AUTH_SALT',        '?Bf>#4c0;hk]f#NzQ3FZ#AN1^a[D/dg*u5~A}y}yGL|wB6 :.1OL-WaU7@~9eav@');
define('SECURE_AUTH_SALT', 'I$-NsI/!MFT!w8>iB^c?iy^x{X8vl^6?!7$_{9hH%h.^X7uqocme;~+6NIEuSVbr');
define('LOGGED_IN_SALT',   'K|iFR**;-h_>#RAGBZKrZS(e.n:]&BUge&fZ6-4`DtN3Zmm`:8jSJ)$@;$-|>-9j');
define('NONCE_SALT',       '4E:uhf?ON*R2Y;%2ikRvx]+S2^ik~h`dDkPx:qmLbs>a/l5@E!Ay{2Xl9&B=`vo0');

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
