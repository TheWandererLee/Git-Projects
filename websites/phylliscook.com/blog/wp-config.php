<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pcookddmain');

/** MySQL database username */
define('DB_USER', 'pcookddmain');

/** MySQL database password */
// Password hidden for security
define('DB_PASSWORD', 'PASSWORD');

/** MySQL hostname */
define('DB_HOST', '10.8.13.162');

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
define('AUTH_KEY',         'od&, ;xC)Z7Mq3W^f+ST{f6`_8ph)FH+60Wz0k*1-.>bB kS=0 tX4*sih&=O$RR');
define('SECURE_AUTH_KEY',  '`[axvYpMxe+qd00`iO=H_j7ADrL#i1UOViKGQ<C%uE_k/wP &n2+XF_7VvN.5Nx&');
define('LOGGED_IN_KEY',    '%~,wP3<|@q!qU~X?rpNFZB6oZ|cecXT+WFdz8`fy>rV9_aB]y><U^`ss8~g%GQGR');
define('NONCE_KEY',        'pI2X:lnYE0?V22yf*gJ=+!sa=F,vSe3aLN(<4],q !HKXJyhIv;oe{G9*FL jo.j');
define('AUTH_SALT',        'oZ;.g):D6>1_#Cr+/SV?o)R>S|Hgd3KBbdcvVM/tz!l6(i_FwCn$(u;a@Z0ZiWYq');
define('SECURE_AUTH_SALT', '23(slV2#p9B~[]e!:V9+X<xJ@o^X*hv<:bfh=us$gq5S),t:/uvZ.`m-D$xJH(^R');
define('LOGGED_IN_SALT',   'm.19JHv^`8Op8#EMbSuQ|<=|9<8%}87$wE 7vma|hv;3*dYd2w{Tyn-!mDZ#IA$.');
define('NONCE_SALT',       '9P%e7rHSfwI_!`{8yU?!/}bDJdx,#?(Y~UfstJ0+qgc&oSCL/&O,9?j)w?aIDE-;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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