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
define('DB_PASSWORD', 'PCadmin13');

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
define('AUTH_KEY',         's~J[To5xZN(.2lH@817[;-#t/,DbbUo|I<&^r:/vz-}; 16oh/W*b7Q$/| jX%IK');
define('SECURE_AUTH_KEY',  '2DW:C2tc*93JS}l]N. k=MdX;n+z97y^Ak)Y@&cy5&! 0f4[>,VBeC_uBkt4cVPd');
define('LOGGED_IN_KEY',    'B0K*J/Cp;Afn+NxB=&er1-G%bPAh[*)L P<j2,[w[?82uj+<-YL,4ezis,_7:N;l');
define('NONCE_KEY',        'b9xdul+M=Des?!0QA+`MO[.9$)N|_?-FbEOU|nTuNS+zyrYI5j0ub>Lg/bRZsL9&');
define('AUTH_SALT',        '+?6WTzz2>GCh.1M`p/cwak50U: !I.o4ZF^,oA}Il(OW:{-={0UMP+XA`sD V5])');
define('SECURE_AUTH_SALT', '69 ^;Z0eQy6(18no1)[Oi,~6GkdP%ieeb_AdC7e+Ik.K2(;b9A0/5GA~Ns=hZ#M|');
define('LOGGED_IN_SALT',   'W_t=8MK;s!n$&Q-8W8)(crPFg _DC!(v7[|U}qQC0l.qcBs{m|5ssTSx44vd=Ceb');
define('NONCE_SALT',       '2.*h[I$I<DB1 fYuRh*eyl{sTMtPfT6h+PWJC^^SkVNByNQL-r3s@j}<nO0 m7b9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pcsc_wp_';

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
