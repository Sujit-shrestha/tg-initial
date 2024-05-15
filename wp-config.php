<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'BVJG^Akawyyyi>|/y^d66`yYJe:I5{!]^y@c=u/,e|9?6Pp&:TkK.n+.E,JK>Tp^' );
define( 'SECURE_AUTH_KEY',  '3dca3$Zjji>Q/QP47lx[vhD&EO)&uT~yD!9H@q@V20Qa}K|pDe9WJl]+Rb; iK4)' );
define( 'LOGGED_IN_KEY',    '<R:1VNdj(Pi|f Ako~A<bhOTRZf!/6NA$w;aMdNcf{/1Gic<,m ?fK27OyX`}fn]' );
define( 'NONCE_KEY',        'Fsq$`k;=@1Ksyv)IKVZc4F1CDPR65(Gc}[<#9?#daJn4JEa+wA ~Ef%muyKBsW-q' );
define( 'AUTH_SALT',        '!/4J6&j(<;h:cS=7+[A4mT9((<cZ*J]SJjG2_zpITa?7sStCI_B%Yj-2c76Jkrrc' );
define( 'SECURE_AUTH_SALT', 'AsnICz; nu6WigY/F6#64zk/6<@6@z~ykiN.wP6x$&!v,@oz7/m`gu1JmXa~sjhR' );
define( 'LOGGED_IN_SALT',   '-lf %cL&i`8FYyR)DAB;hlC0N}L2!t6%XbtNwlr:#}qgCFAk~Qav<:enE~OE1OWv' );
define( 'NONCE_SALT',       'Hb#oJ[g5*ck3(*s14inc$fGVdas,5{y),=Xb7[]|]5!>l*4UI~H$V+QRk6xZhvsK' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
