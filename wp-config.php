<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_SERVER["WORDPRESS_DB_NAME"] ?? "oc_p2");
/** Database username */
define( 'DB_USER', $_SERVER["WORDPRESS_DB_USER"] ?? "root");

/** Database password */
define( 'DB_PASSWORD', $_SERVER["WORDPRESS_DB_PASSWORD"] ?? "password");

/** Database hostname */
define( 'DB_HOST', $_SERVER["WORDPRESS_DB_HOST"] ?? "127.0.0.1:3001");

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define ("WP_SITEURL", $_SERVER["WORDPRESS_SITE_URL"] ?? "http://192.168.235.128:8000");
define ("WP_HOME", $_SERVER["WORDPRESS_HOME"] ?? "http://192.168.235.128:8000");


/*define( 'WP_SITEURL',  getenv_docker('WORDPRESS_SITEURL', 'example password'));
define( 'WP_HOME',     getenv_docker('WORDPRESS_HOME', 'example password'));
define( 'WP_ALLOW_MULTISITE', true );*/

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(A$?GT+1H`8vHrp8[|hlhN_Y<OwR6yY~<@^EZH2C>);3$7D0Xz#T=vuD9u^F1D]q');
define('SECURE_AUTH_KEY',  'Xw}9T-NI159t?f_=G-7-3|V$:]?`| r&dhk1-MV<QlX&E;Kfafrd<BXZ(+/(v)+f');
define('LOGGED_IN_KEY',    'K!jBh[XE;[T_3k^g] .+a|X]]+c*E|S n5{[ O:Z`,}wPnxGoN>,C=+U(|01|xa`');
define('NONCE_KEY',        '+-S_WBRO)B5/1jgFQx-UqWEYu2|Pcl&#VhY-fh9f4_.cg}!}(q+BrK?OEOZh85)o');
define('AUTH_SALT',        'KNS>J6yxE9~I^j&g>fYl^C`xH5+#!vN0jGTn3j-&4[ajY{{C9M^S)Jj[HT}fzPed');
define('SECURE_AUTH_SALT', 'Q.x6Sv%z,qkuBbv8^ut|hw6[N+j=>(<~;2Dqc#b7#nG?Yk(Tg<%Q#_jBM8N4|~z4');
define('LOGGED_IN_SALT',   '7u?g]e1i!5+^@>Gjz[_+NBueo>qj+d#G|]MvZ@W-3BZO8r1Sc8[Bv%EU!=8)YY/.');
define('NONCE_SALT',       '?(ZhKiG(Bc2PoP?AG4t%;Dwj}~;|C@Md$ mv8tq&!Tj1#7kx^&?/ns{cov$ni@8-');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = $_SERVER["WORDPRESS_TABLE_PREFIX"] ?? "wp_";

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

define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
