<?php
/**
 * Plugin name: GitHub Repository Commits
 * Description: List the commits to the repository of the current project
 * Author: David M. Miller
 * Author URI: https://www.davidm.website/
 * Version: 0.0.1
 */

if ( is_admin() ) {

    require_once( plugin_dir_path(__FILE__) . 'includes/functions.php');
	require_once( plugin_dir_path(__FILE__) . 'includes/github_api_connection.php');
	require_once( plugin_dir_path(__FILE__) . 'includes/list_repository_commits.php');

    add_action('admin_menu', 'dmm_github_commits_admin_menu_item');
	add_action('admin_menu', 'dmm_github_commits_create_page');
	add_action('admin_init', 'dmm_github_commits_register_settings_section');

}

