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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_devvh101_growthside_app' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'B:mDX/g+&])2[$r.6V{uO=f7m4dau2P5q?9<HM])#:h){@O->ydeAMqUEwz#z9t=' );
define( 'SECURE_AUTH_KEY',  'vSk~!-Rw69NLXBO[u1e[(bKPY$Mn}p0Lt7k6oal$#x^XQa2%qj596@+{fyg|Tur,' );
define( 'LOGGED_IN_KEY',    '*|7yH3@/LTKKq;x~Z@1s?TB|d$HY2-ZIU>[Ji#su}0%J@$gOG;Gd--Wy&#0sh)(U' );
define( 'NONCE_KEY',        ' QY)Oil!/8W6jqpO3je;fG[:7U/Cu&F*6E.kDM!Ou^$_{LY@231I?wl .8k$~QJ6' );
define( 'AUTH_SALT',        'hf|Lp:CF**we=VrOzrDg?Ph5sLYDc*6)^:MAt~WwVbuIL/{mPlQ3xDLLELW>XGix' );
define( 'SECURE_AUTH_SALT', '%WzVr5QdWE(bE.zw4ZWjomC0-I_=%|HLPh3+<Qr>_^%1k,U-|9;b(I5[DM4km:tp' );
define( 'LOGGED_IN_SALT',   'KL@rwRDg$!zg?7E<xg2o].SW^_5JQWu{-o+1LN%gkf!G&IoaLxr_R1Y.(|g,8VDB' );
define( 'NONCE_SALT',       'mrll g.C7dP((NQW7X q{,iZ(e-KihuZIx|/Zn;fDl&S8w,_k;F,_4bM($X4@I_M' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
