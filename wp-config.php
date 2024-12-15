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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mercedes_db' );

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
define( 'AUTH_KEY',         '(,G53P$Jj6)4uKi/LtrV&qxvb;AVln{hiGWcf$nD~y|9 aV0>yjpz&:Vs;wCkRw8' );
define( 'SECURE_AUTH_KEY',  'B:i@J_Y{8u*_^.$u:jokiZ5TC7s|GW3L27HVe1OJ+FoV?_z+T+b}u73yE$f5b7{L' );
define( 'LOGGED_IN_KEY',    'o~P&Z0C{rJm+d>yxTJlSAcpLQ62bCH_~oRI(D7p )sc_%p>rZ(`@!<E4DV7lP%t}' );
define( 'NONCE_KEY',        'g&TTClF(Rbharv=8ZCEWd0K`P{Wvx=u@`4`qA/Lw%v)Rs4@3<W=a0go .E-H4;=v' );
define( 'AUTH_SALT',        'jys?a?kC7%i6G|>eS6aXMm$YK<+gg) _[gww*_{D#GS?%fI@iI~v%YMd)BQ*Dt7L' );
define( 'SECURE_AUTH_SALT', 'cUM*;]B(k@WW*DvK@=]M-qN~cZl}IEZJ24rZRweoSKJJS~0EG]8A8o0$@c$#NJmK' );
define( 'LOGGED_IN_SALT',   '+{7o>#a9mp@j%b4m6^j,670j1Ib,Ti)Mz6^-n`2^G;/!6J`I$T9Nl}L:6j |M^<T' );
define( 'NONCE_SALT',       'K9b=GsE:3Ns^I?7.thEg2MHV`w(yNG=PHb]3`)_)A Vu+]OX !)ZodwIJm]qsZNv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
