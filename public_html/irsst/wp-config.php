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

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {

    /** MySQL database username */
    define('DB_NAME', 'retourautravail_irssttt');
    /** The name of the database for WordPress */
    define('DB_USER', 'root');
    /** MySQL hostname */
    define('DB_HOST', 'localhost');
    /** MySQL password */
    define('DB_PASSWORD', '');
} else {
    //valeur pour le serveur dev
    /** MySQL database username */
    define('DB_NAME', 'retourautravail_irssttt');
    /** The name of the database for WordPress */
    define('DB_USER', 'retourautravail_irssttt');
    /** MySQL hostname */
    define('DB_HOST', 'localhost');
    /** MySQL password */
    define('DB_PASSWORD', 'r9KGOT1137db');
}

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
define('AUTH_KEY',         'S]{E7<$Fl& 8^?LmdMz+@(mZ2loE:ht41+[GxH:;~e`T~~Lv$td~i*j1b0vu6tki');
define('SECURE_AUTH_KEY',  'kOs&Lxhcqyz_Ht=_:gG-kSSE5$b})_m@!^{hx.?_GBB2qipHA 41Xa9-|ap!/B8X');
define('LOGGED_IN_KEY',    '8A13UEvwsR}MfZ;aT:*v&x~l tb%lIRRXw2ext GWKe?L(d$]VEz]-t0p9fUx~.}');
define('NONCE_KEY',        'i%/(r=nKWsT6i7.z7Ro+ki,73fH25eiG8F<0=L1w&kixU3U`fZ|--Re* cLT*)Nk');
define('AUTH_SALT',        ';y& g9~rG~hXIMY8ExSh1Bkt;jayB);tEJ8N4O?HKx:%1NS8*NG#lDpjcp( [U?>');
define('SECURE_AUTH_SALT', '{m#NZiIv;88ps&0Q4F+dJ?HT[@6hTuwZ(AM}V&[pU*TQ*)vKW!/?J7:k(+n2x3v)');
define('LOGGED_IN_SALT',   '0.7 9?qyZ=!8eh/Zm R%u>.VMzQh=NTjM,5fpGLPhNNOt2!/N7dpwHH7kUgm},yU');
define('NONCE_SALT',       '$zyW,$r}NJW[L`;/q~&X &lC{lApUG&{6bk@>k9(8-~ta(<B(!u!?2[lc|Zg Pa,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpstg0_'; // Changed by WP STAGING

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
define('UPLOADS', 'wp-content/uploads'); 
define('WP_PLUGIN_DIR', __DIR__ . "/wp-content/plugins"); 
define('WP_PLUGIN_URL', 'https://retourautravail.irsst.qc.ca/irsst/wp-content/plugins'); 
define('WP_LANG_DIR', __DIR__ . "/wp-content/languages"); 
define('WP_HOME', 'https://retourautravail.irsst.qc.ca/irsst'); 
define('WP_SITEURL', 'https://retourautravail.irsst.qc.ca/irsst'); 
define('WP_CACHE', false); 
define('WP_ENVIRONMENT_TYPE', 'staging'); 
if ( ! defined( 'ABSPATH' ) ) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
