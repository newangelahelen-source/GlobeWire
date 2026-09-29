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
define( 'AUTH_KEY',         'ykdAb`@n6Ie%P65nV;gUx>M`ax Lm>_ub`|8/O8#%xAQnu[mK)mly>d._7?mE(8#' );
define( 'SECURE_AUTH_KEY',  ');P&|Ck0#CX/M>e`@YSA_e@Cq:)(un8YAGe{b)ey<#:jba_V@KI68pcXLh,hIk6U' );
define( 'LOGGED_IN_KEY',    'loYY~h^k#8NvN51{?)4Ng!@UT3}jMLTV3V~7LW1dL?@(x};FTie{UM[&zkh~grNU' );
define( 'NONCE_KEY',        '_z>JgYd+mA*sU5Q~QZ6YWmmH3K[kWTB#b=O*c*ho,=qb&HQ4!f{XrepSrpz;U1;[' );
define( 'AUTH_SALT',        ';|z94{~1g<EU&ZbU|F+tM6SSOEYv{GBJe8-X/?)NRNj8uBZJ%Zy6TAI=fO%uBWIg' );
define( 'SECURE_AUTH_SALT', '{0K)ARAQ.)ZJF`RMQ1$BK?*|<9:W<q4@!ArVigoKcJsQj+dbblRw|id8fD|PQFhU' );
define( 'LOGGED_IN_SALT',   '4]h W.wH.!07|$%}:ImE+t@G:]2N)9A(Qn$|iZybKM4yv S!p5z5LCT3mTNj1c|M' );
define( 'NONCE_SALT',       'pRn K6R>WA[ku!)=Ke+8m,)-ijC{M`}yDx}{zH8A 6n[tjKf_ND*VgZ.0J;$mM@C' );

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
