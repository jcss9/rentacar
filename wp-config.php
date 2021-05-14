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
define( 'DB_NAME', 'rentacar_bd' );

/** MySQL database username */
define( 'DB_USER', 'rentacar' );

/** MySQL database password */
define( 'DB_PASSWORD', 'rentacar' );

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
define( 'AUTH_KEY',         '0B>;PLCnfXqinc[&H8;uQ_0w-!],GTRTA19hN<^?m;xp^U)8bB)j)=X.lFD0B! l' );
define( 'SECURE_AUTH_KEY',  'YY~h0gM/=S^6XAzK,Jcf`}~.}ixHD;:dOE4~0{;R2Nz@?HSnxI?!ufwt<U].2R+~' );
define( 'LOGGED_IN_KEY',    'Y:Nf@)Y@2#RO#!15HYKc[a`,imVPFH$5#&x@lTl(:_v%K-:k`yYjCF`>{6.XMNfF' );
define( 'NONCE_KEY',        'B|qPJ/yg@L%^&z[G*w;g+ET$cpB-RdmW( ~YLtZTOs/ff{N$53x=8<E,[3h~@YW&' );
define( 'AUTH_SALT',        'hX7stgFe9koZ/bs8RMZtC0;=nN.fKzX~P5Y+.B*L6G&*zq_9-R8H~$ryNJt7e-}|' );
define( 'SECURE_AUTH_SALT', 'C>7sfKN$x?x8&r28lxybc&**boV[0>);~m,f]8%o0zk7KEDvQB28xy,IAr0@9f t' );
define( 'LOGGED_IN_SALT',   'bz9&ZcGP<ce|^$W3DLB%W.BX%}wErqIcfeL,l>JW?X@KB{x[0x4tTeTd65?#=oZD' );
define( 'NONCE_SALT',       'c*-GoS9>i*4?Unn4_]-7)WkP0%oJM3_KuiP6h}PU;J)X1ej@bA<2;-$Y}C2 rC=F' );

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
