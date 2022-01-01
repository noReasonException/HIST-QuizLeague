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
define('DB_NAME', 'EduOne');

/** MySQL database username */
define('DB_USER', 'stef');

/** MySQL database password */
define('DB_PASSWORD', '12312312345');

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
define('AUTH_KEY',         'L)p:EU)|@(v9xN~H7?p00>lUuI]mR2_7Kr$^5V=qgV]k*?P0y:#L,=%q_xvT<Wh;');
define('SECURE_AUTH_KEY',  'ExKEBe~noB]LJhxNx3I#}x2hOI$M*YJp/(%]saU@Q|M%aF;MV9Yz(q_M2(dX+f,-');
define('LOGGED_IN_KEY',    'qpDlOrU}`7R@M?pL--}6_za_+*Gr/t,qF0Xc]C4Z:R>9QlPUgDfN:Hg$Y9,xZ1zn');
define('NONCE_KEY',        '.9LL)x<aZb|eFBU/}uL5p4j379Y#vejn(wx3DIn`g`N{rE[5_fyvGxJLTsgNZ~8r');
define('AUTH_SALT',        '-x^^1<v*lMF=@>QSH]SYXvK%_qS>7)LIokU+de!C?2)CRGfMr7;k~B7y{!-v^5:G');
define('SECURE_AUTH_SALT', '#$L`ju{AZ+g}7AnIH23!An]CgpMxU~0vo2/PV4h|Z.TZp W#m#[94[r#*CJ:,mzi');
define('LOGGED_IN_SALT',   '4i[2,%~+!& Jzz)%(w6B~mK>Up/mp,^QnXGpeP.ZmGRyt:&$f :x-_pi~HCwcnQL');
define('NONCE_SALT',       'X(JX<@CmtjKSf|w5Ins4s#D+)451YSa(}UU~0bh,P)N1^@5Y>Q4IW4k j^|[7Z,.');

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
