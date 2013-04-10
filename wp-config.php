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
define('DB_NAME', 'test');

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
define('AUTH_KEY',         'Jq*%iFd_!fQ0{Bw7)2fZ-yAqR3xJ>x|#@ypzy#35l[epYQqtq.@){wO[d(pZ{% S');
define('SECURE_AUTH_KEY',  'R#pcso+4-uwr<2/RaIoe*u*t$mP1d#Z!?dl a3#E.1s>E_8Td%U:-$~o,IBr MRN');
define('LOGGED_IN_KEY',    'Z;60HK/TwY}WxBe?kzWh x({@t$Vy3?,2%axb+.lI|f~%oV7~,s}.Gdyx-4k!2.c');
define('NONCE_KEY',        'nijE_Z3:G;tbAj`t,Jd>5E7|9K>uW~uz6FGI X:aF H`ZIWl 3r&H)i_iA9.:X%$');
define('AUTH_SALT',        'S097r1GY(wq%k;$U4$lkl4FXr %@>si;*9krCL%zl2=rQXU&Kc52RGy%<&{T6Y2n');
define('SECURE_AUTH_SALT', '!p1`iZ`p{I<.]u<l|dtSvoe*[I0l]c-Y>;RMY_lpQ]G+oC9r_W/5|>t%nQ5ZKb=O');
define('LOGGED_IN_SALT',   'kOZ_J.}(4$QL^)~~F%EzXs2PdfF P88, /B}94<nARBdl~0^FK1X5!H*#`-ln|WA');
define('NONCE_SALT',       'etz.&Syd5~kNh-h#h3wm<8?*>Ln5.O5b_44w#SLg!]E[K:&}znTRvIe^K4.9xlXE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lite_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'sk_SK');

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
