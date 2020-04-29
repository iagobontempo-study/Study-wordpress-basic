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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Odt<>vJ9B18J6-xw{FuFI_u[bev$%.$o9/9+jA%WqiLMsN<OI-ADBP2a9_Q!X^R!' );
define( 'SECURE_AUTH_KEY',  '_%,TLOc~s;z#JAz$DR/,BQvsa&@Xt7;ULBb,Z1YRuUsW{9nY9Znt8W*?g&$@@sl2' );
define( 'LOGGED_IN_KEY',    ']Nc@/d[RYs$U>{YTV(qfI@{ 0glTO$|zInu5+ {/i-%(?.IPS{)xUr[/GWD@B4Ap' );
define( 'NONCE_KEY',        '`v&4G%@6:M/w.GXx5h6)[6Dh%x$T,3A1*tK8WZk2Kh9E8fC-|9Yx={<]kHRyYVI=' );
define( 'AUTH_SALT',        '_oCz&D}W*watqEznP_uzD;v,dwX>@e(bjdUg=Rxk~fi;p>QEN!~i6VWxSbYxz;)l' );
define( 'SECURE_AUTH_SALT', 'V{%&sFn`}GR13Xx@9G2zT?zPLelN$,s]LUp4BEi9:+m`!Ub8:s2Zd[p3;h@bgvj`' );
define( 'LOGGED_IN_SALT',   'Jg>l54[v4G[/hK_p_)=7-;A=Wr_stVHTL#Wpd@,=c-OYGq{66-n9xH9xSu^&odA-' );
define( 'NONCE_SALT',       '7D bQj^L8R~WlGGyuV;cBW7~|lP~35IB5`!5Smud7J@h$>r~3zYe`Ub_&lycWmfe' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
