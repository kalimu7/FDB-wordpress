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
define( 'DB_NAME', 'FB' );

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
define( 'AUTH_KEY',         'ZoOc_]=iP^-&bEqbI.Q*YD9(J3|Oo`14G=i]m`y3:m8c@29j2<CWH!KNuQA5|oVT' );
define( 'SECURE_AUTH_KEY',  'y;uz65Jelowavf0+l.}6wneQ5sYIUb~QJ_WR8-fN52[ry:(X/DxV@|j=xb3O*lMc' );
define( 'LOGGED_IN_KEY',    '0S4wDZA79$OoV/7?]?~f:lJ+*ej]GY|_@MI6QXk]:a+k9Br _V_K$Kc3tLi[qba7' );
define( 'NONCE_KEY',        'ET-FR2A[_3,pdS=Fo^Dp}@Y6u}|cIre(Ji=S9NEZ{AL3d@y:3icnHNvnNK%!bzM8' );
define( 'AUTH_SALT',        'C1q5L@9J,<nK5bH=wM8Dyw$BUITXfJaY$D8ln|{`g78zX4a32Zn-&of&Y]0y^kjJ' );
define( 'SECURE_AUTH_SALT', '/8hTU%B+dnOu[A-k>z7[ L>c_~(FTm<_|W,Zobw<_ng9l]aFtCLv<:/|zRH0@^rq' );
define( 'LOGGED_IN_SALT',   'zZ) WmSM$d<6s#J2-:+FGgT:(To:i}JXl#l,LOHvKe>cWTr,IZT|T:[Mbd&fLa4m' );
define( 'NONCE_SALT',       '/2+_RXb?cEyNBf2MCYk/F ]P6tAD0)F;Um>a3l32wSGv}6P=)X*uI(-z</z<aZKy' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
