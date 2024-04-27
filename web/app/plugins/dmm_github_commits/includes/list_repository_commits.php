<?php

// Define a function to create the plugin page
function dmm_github_commits_create_page() {
	// Check if the user has the required capability to access the page
	if (!current_user_can('manage_options')) {
		return;
	}

	// Define the page title and content
	$page_title = 'GitHub - Listing the commits in the repository';
	$menu_title = 'GitHub - Commits';
	$capability = 'manage_options';
	$menu_slug = 'github-commits';
	$callback = 'dmm_github_commits_render_page';
	$icon_url = 'dashicons-admin-site';
	$position = 2;

	// Add the page using add_menu_page() function
	add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position);

}

// Define a function to render the plugin page content
function dmm_github_commits_render_page() {
	$repo = get_option('dmm_github_commits_repository','');
	$data = dmm_github_commits_api_connection();
	if ($data === false || trim($repo) == '') { $data = '<h3>Please set the configuration in order to establish a connection with GitHub API</h3>'; }
	?>
	<div class="wrap">
		<h1>GitHub Commits to the Repository <?=$repo?></h1>
		<hr />
		<p><?=(is_array($data) || is_object($data) ? '<pre>'.print_r($data,true).'</pre>': $data )?></p>
	</div>
	<?php
}
