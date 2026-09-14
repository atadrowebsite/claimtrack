<?php
/**
 * Plugin Name: ClaimTrack Core
 * Description: Core data, CRUD, dashboard, import/sinkron Excel/CSV, dan export Excel/PDF untuk ClaimTrack Region 18.
 * Version: 1.24.3
 * Author: Atadro Website
 * Requires at least: 6.0
 * Requires PHP: 8.0
 */

if (!defined('ABSPATH')) { exit; }

if (!defined('CLAIMTRACK_VERSION')) { define('CLAIMTRACK_VERSION', '1.24.3'); }
if (!defined('CLAIMTRACK_PATH')) { define('CLAIMTRACK_PATH', plugin_dir_path(__FILE__)); }
if (!defined('CLAIMTRACK_URL')) { define('CLAIMTRACK_URL', plugin_dir_url(__FILE__)); }

require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-db.php';
require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-import.php';
require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-export.php';
require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-backup.php';
require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-monitoring.php';
require_once CLAIMTRACK_PATH . 'includes/class-claimtrack-app.php';
add_action('init', array('ClaimTrack_Monitoring', 'bootstrap'), 21);

register_activation_hook(__FILE__, array('ClaimTrack_DB', 'activate'));
register_deactivation_hook(__FILE__, array('ClaimTrack_DB', 'deactivate'));

/*
 * UI hooks may be registered on plugins_loaded, but page creation MUST wait
 * until WordPress has initialized the rewrite subsystem. Calling wp_insert_post()
 * too early can make core call get_permalink() while $wp_rewrite is still null.
 */
add_action('plugins_loaded', function () {
    ClaimTrack_App::init();
});

/*
 * Run database/page bootstrap on init. At this point WordPress has created the
 * WP_Rewrite instance, so creating/updating managed Pages is safe.
 */
add_action('init', array('ClaimTrack_DB', 'register_post_types'), 5);
add_action('admin_menu', array('ClaimTrack_DB', 'register_admin_menu'), 5);
add_action('init', array('ClaimTrack_DB', 'maybe_upgrade'), 20);
