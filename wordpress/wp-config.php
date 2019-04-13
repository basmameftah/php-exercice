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
define( 'DB_NAME', 'basma' );

/** MySQL database username */
define( 'DB_USER', 'basma' );

/** MySQL database password */
define( 'DB_PASSWORD', 'basma' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tm6@.jevSN8O}8@IDYtFR4t2$|xi5&+#n6B}#W(N@oj_pi3 *L[:=zuN},G d*N?' );
define( 'SECURE_AUTH_KEY',  'aTuci[~/FyRWSto:g9CoZRr(dXx_S#Xi~PC+Vu/SF_o$o-HX^w%p]d^;10DmafX9' );
define( 'LOGGED_IN_KEY',    'c3wgV;KTo,6uQngtF|wkl{W}QK,76#y2*Sg=(~2]Een;Po}8zK89u*i,deY8C!5a' );
define( 'NONCE_KEY',        'H|R?Dvx<>^o.9eF%Fx~0:YW_[]B>`RC+hNmrhjmAyIbpu9IL)OcfkUr6`kR69Z*j' );
define( 'AUTH_SALT',        '<L #WLobk{q0`%&t!LJbyorpVg/y)Rm?n@h%<v/!8mSz!OV~3tMu]+g]i[TFW{mc' );
define( 'SECURE_AUTH_SALT', '3a=qTFE?gVf~<SDk]E`Ffxon[?SM(o)VIQ$4xTp2V[40]N6F&^G<TlcloW{#V!~>' );
define( 'LOGGED_IN_SALT',   '(b,NP/[kO?g;1{]LMk6lki?Jr#rCED`}VSV;<b9oo@~LfK2/G0.B^@uJG1&A${0J' );
define( 'NONCE_SALT',       'R`Z#}IvB&E]#aU16gig*t(?f$)_bYvOx<p-TLU?O%Lx8(4+Qwp}vsA<*A+no*%uV' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
