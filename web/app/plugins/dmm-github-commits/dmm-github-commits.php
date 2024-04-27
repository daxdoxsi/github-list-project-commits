<?php
/**
 * Plugin name: GitHub Repository Commits
 * Description: List the commits to the repository of the current project
 * Author: David M. Miller
 * Author URI: https://www.davidm.website/
 * Version: 0.0.1
 */

if ( is_admin() ) {
    require_once( plugin_dir_path(__FILE__) . 'admin/functions.php');
}

