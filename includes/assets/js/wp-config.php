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
define( 'DB_NAME', 'flapptravel' );

/** MySQL database username */
define( 'DB_USER', 'flapptravel' );

/** MySQL database password */
define( 'DB_PASSWORD', 'flapptravel#20' );

/** MySQL hostname */
define( 'DB_HOST', 'flapptravel.mysql.dbaas.com.br' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '9TXG)im6IGtRsAtz #|Ye<+.[~!:Ow0,yHS>V*3;MH![@gq=vlt(c>>&B&xD/^y,' );
define( 'SECURE_AUTH_KEY',   '!zgxYX5~_m3X)wMkAn<&=|CGw%@7(<oD{a#Zo/T`2):Lm2Q4,futqgOF,`uimGb5' );
define( 'LOGGED_IN_KEY',     '!ou!J1PU( >VelvQp4]PX~LzpI{&2.^c)czw1zV+.Ydi/Nv1`G~}tzI:r?AH*$*A' );
define( 'NONCE_KEY',         '<A9{~#aGz|V5kF5x%ZC;2d9{rEm~^7I.!PBh]C3I[Ui??r>8?X6?srthiCoJ|MjL' );
define( 'AUTH_SALT',         '[|8oA11Vk]Z/V>Wnv+pO_vWgH5dO>p<N**zuHb!&),mB3k=eGj2TQX=J@P|~@7.t' );
define( 'SECURE_AUTH_SALT',  '$qCu#MN{$p18}O6IBMfg:T`^O$lZP9UWR?jv-hOlcySQ`a0.gBG30}b2*OAAAyHN' );
define( 'LOGGED_IN_SALT',    'Si}*+y9AHKIk/^Iqi<<@eDLA;_(#5F9{5+XuntQ]t%rWM?_es Vd%8[E+,c9-*?@' );
define( 'NONCE_SALT',        'agN7f-%9/XA|^c1DKk?3+an9bvKU[7V$D_51IHp_D5((mWD}Arwv$E21*I%g%RCy' );
define( 'WP_CACHE_KEY_SALT', 'aK3TNIV_g$c#@A{~tG`aVKX_KZ-iM]>Q<N3Y*YL&:WyZoR$ZF-B/|%q--w@y{2@T' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wordpress_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
