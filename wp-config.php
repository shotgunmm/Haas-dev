<?php
# Database Configuration
define( 'DB_NAME', 'admin_haas' );
define( 'DB_USER', 'admin_haas' );
define( 'DB_PASSWORD', '7~zhQ93x' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'haas_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'Mv-Y/0eR3~.3wY7-p`iSzMIKLKv+`tg+wvr<Bb&b9-q#_hg]<VlTDN<-+@Ey[s +');
define('SECURE_AUTH_KEY',  'rgWt]PQPzq1VmZ1*W{YG?X;lnfv.pnlwpH3.CM4iUOI}(<@n(v-F+D95kV:j3VIH');
define('LOGGED_IN_KEY',    'W65vt&-|sYyWFPa*-sk+VF]joUISFI 5W9k7A|afW.4=RbV/aLm54D_kf!7oPK2D');
define('NONCE_KEY',        'xF?B0osVV1@anV-%Pb+tYj/(~w:s7X+|u3_I31;u_7HpFkeVm4Xs@QV*dYe{.#P2');
define('AUTH_SALT',        'STI]eqI6!S{s/kCD9,C_-!-m1}W)xzsezzl7V8|80cd/allSUL!Vd*r-I+ddzX 4');
define('SECURE_AUTH_SALT', 'h;q/.%%doerK7B+Y0t++VKAIX]90TJl5xhhDM7is>~^9U+RFYU4c~gADm7*^Dbvf');
define('LOGGED_IN_SALT',   '+&5 +Zw/|&B_y4;V;&5Vp-^IkqV7}LWN79yXj/#l}xXr[L&^S9H0n [QJc$-xA-!');
define('NONCE_SALT',       '*P]dL27OZq-)<]1&jnt4e;wy5fNb) ?4a8t.N9sfS=FJ<(AXarR&|eO@TkSTnO@5');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'haas' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '28495ce26157d7766c69e5603b297041e8bca22a' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '42336' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '45.79.102.238' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'www.johnihaas.com', 1 => 'haas.wpengine.com', 2 => 'johnihaas.com', );

$wpe_varnish_servers=array ( 0 => 'pod-42336', );

$wpe_special_ips=array ( 0 => '45.79.102.238', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
