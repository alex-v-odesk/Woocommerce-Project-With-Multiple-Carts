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
define('DB_NAME', 'dtsRp');

/** MySQL database username */
define('DB_USER', 'dtsRp');

/** MySQL database password */
define('DB_PASSWORD', 'Linux@123');

/** MySQL hostname */
define('DB_HOST', '166.62.8.51');

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
define('AUTH_KEY',         '~Jm4*B4>HmG~Ps!~~twB`_D9OZyen?we-$y=V6dyX#VI,sbE,8`rMT:1JYQOq1+V');
define('SECURE_AUTH_KEY',  ':BOD.[u4 u8}B^~qpVGT]EePw1U]S#HT&vC/HQ.W$6jmTa?M][#`fj61A!bQa.Tl');
define('LOGGED_IN_KEY',    'O&<c0j>ZZ(vBPly)ybzU,9~+>vv#_h!wy=RsQ gNtrDW.#!QX<FSXi+[AOIX-hvS');
define('NONCE_KEY',        'ko),J16cf8>q)b;J~efwa@D^>y76^NZ|75Dzz]6vS_I9;0GH$_nrrbr*N?3a*rKg');
define('AUTH_SALT',        '>%Me+W<~}1Bw7:vqF!Y;uD}Qy|L&4dkYv~n=AceX6s8]iH@EW^ (J{tdZ#uN%>Y]');
define('SECURE_AUTH_SALT', 'ADrQa2|,6/Tl;$dg)efG_LXFSZvv|B!:X:FA5]&@;,XGp+^d_qNb(Bb!No!%Zkc!');
define('LOGGED_IN_SALT',   '/0<wW~?)7({>U`Eey7&u[g|sB^qBJ/P-1M7tnT/ku=&G|}l-93;g*fg_q`Qc:1h_');
define('NONCE_SALT',       ',u:44zsj+[lG8ewRvY?njZ&E;=bgYfDA(#v>UtFXpnQ#:F9z|Y8VL.=^-#.Opb:x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
