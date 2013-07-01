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
define('DB_NAME', 'shinrai_dojowp');

/** MySQL database username */
define('DB_USER', 'shinrai_sensei');

/** MySQL database password */
define('DB_PASSWORD', 'Sensei-san');

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
define('AUTH_KEY',         'X!E.`wZk}s3|8wDrc~b3lyM2m1!mO,WobQWe-Ag0EV[W&&E/;8@u]X6X3+AH+sL<');
define('SECURE_AUTH_KEY',  'IS?}mtcOZ-r#&#Vh9`tywTsmv%w(bWXmz]%+f@$-[E(k3yX9h |,F5@fdb(ELA?H');
define('LOGGED_IN_KEY',    'I8.Bn)!Rd(=6+IoU%8R]xX#YskWx2dcTUz(S-|q77Iz.xwZ@=@Cw/QqvtHx;9x-[');
define('NONCE_KEY',        'EN%n+JuV?](GZFf`ll:c(h+|pv]OV}TuacQ5|nM61hb4/s-:]kFOyPSQ|sWaX+.[');
define('AUTH_SALT',        '18ckyQA|48o^S@kF0o*Q-8k]YfG +/yOSv9^XpQ,3GHR%yX>_w/#{iW/-8SN{jPi');
define('SECURE_AUTH_SALT', '3-Sdmj1c6<ToWJT+iXPlfBpuOln-BDZP.$:(+Rimq0W/{q^=>F_{$X69BF|i4QxQ');
define('LOGGED_IN_SALT',   'JRbqWf<OOT:)*g0DcOf3Z73mB^G(t-7^Mh~ri}6TE:lhw(Iq-N|9JHf|pcYb|Y3P');
define('NONCE_SALT',       'J-Mwh=gvTBWdR#J_I4(N$MJ/M+HWhl9M@4%%37%fG@XLSJT%0NAw*wJ4U8!u}`s<');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
