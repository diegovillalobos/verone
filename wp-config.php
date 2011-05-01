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
define('DB_NAME', 'verone');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '5t4r3e2w1q');

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
define('AUTH_KEY',         '/BJ$h2-&|BLPW9?LL3xqa&H0J9^U8r`i5gM=HynxkWG5Ybo+LHBWa-U*{%{?Cx1:');
define('SECURE_AUTH_KEY',  ',;=QUHHxCsO]jCnR%OxnmdR901/ssegi,dsa|d_56DnBei_=(2HnU-|xIy.$G`1j');
define('LOGGED_IN_KEY',    '%-x-yYt39)FK6gC<!SvoX|TX?ma2=c)5~J+BD2Z|8 nf|vc:H[tH5yW/{h2y4slt');
define('NONCE_KEY',        'Z$2BtgJ4y*lcd{FfE~Z&HM:{?=(VU0E<acV[CPqi/!.6D h9T8R$Miu*+od^Vn)b');
define('AUTH_SALT',        '7>&txzan9wggW ER1L#U#pis&Z-B25~ri0PR)EV,;@?+%-;xQ2xjfB`i`5GMU^k}');
define('SECURE_AUTH_SALT', 'cIU4wu+NHp*rSOA%/50:q]?mBz/|bVY[-tK:L+p)OLyAEo!& +nL0Sw}y?L%8N|-');
define('LOGGED_IN_SALT',   '77x;cu+1(1@q#,k2[m3K%Y)4e^k+}JH+#Lf`0@[JSTiAP_@^c?OqF-#]>O[j5SfG');
define('NONCE_SALT',       'LHH$$[iza+V+?Xw|>hRIM1a }F++P~iUt^c|K%;V.fBRogj3lWpA?jk5lF!)y(z1');

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
