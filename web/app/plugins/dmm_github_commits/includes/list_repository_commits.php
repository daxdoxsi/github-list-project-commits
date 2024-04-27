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
	if ($data === false || isset($data->message) || trim($repo) == '') { $data = '<h3>Please set the configuration in order to establish a connection with GitHub API</h3>'; }
	?>
	<div class="wrap">
		<h1>GitHub Commits to the Repository <?=$repo?></h1>
		<hr />
		<p><?php
            	if ( is_array($data) || is_object($data) ) {

                    $output = '<table class="wp-list-table widefat fixed">';
		            $output .= '<thead><tr>';
		            $output .= '<th>';
		            $output .= '<strong>Commit</strong>';
		            $output .= '</th>';
		            $output .= '<th>';
		            $output .= '<strong>Author</strong>';
		            $output .= '</th>';
		            $output .= '<th>';
		            $output .= '<strong>Date</strong>';
		            $output .= '</th>';
		            $output .= '<th>';
		            $output .= '<strong>Message</strong>';
		            $output .= '</th>';
		            $output .= '</tr></thead>';
                    $output .= '<tbody>';

                    foreach ($data as $commit) {

	                    $output .= '<tr>';
	                    $output .= '<td>';
	                    $output .= $commit->sha;
	                    $output .= '</td>';
	                    $output .= '<td>';
	                    $output .= $commit->commit->author->name;
	                    $output .= '</td>';
	                    $output .= '<td>';
	                    $output .= $commit->commit->author->date;
	                    $output .= '</td>';
	                    $output .= '<td>';
	                    $output .= $commit->commit->message;
	                    $output .= '</td>';
	                    $output .= '</tr>';

                    }

                    $output .= '</tbody>';
                    $output .= '</table>';
                    echo $output;

                }
                else {
	                echo $data;
                }
                ?></pre>
	</div>
	<?php
}
