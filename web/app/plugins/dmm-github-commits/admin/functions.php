<?php

function dmm_github_commits_admin_menu_item(){
    add_plugins_page(
        'GitHub Commits Settings',
        'GitHub Commits Settings',
        'manage_options',
        'dmm_github_commits_settings',
        '',
      null
    );
}


function dmm_github_commits_list()
{
    $personalToken = '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';
    $user = 'daxdoxsi';
    $repo = 'github-list-project-commits';

    // Define the URL of the REST API endpoint you want to read from
    $api_url = 'https://api.github.com/' . $user . '/' . $repo . '/commits';

    // Set up the arguments for the request
    $args = array(
        'timeout' => 20,
        'headers' => array(
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . $personalToken,
            // Add any other headers if needed
        ),
        // Add any other request parameters such as 'method', 'body', 'cookies', 'sslverify', etc.
    );

    // Make the REST API request
    $response = wp_remote_get($api_url, $args);

    // Check if the request was successful
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo "Error: $error_message";
    } else {
        // Retrieve the response body and decode it as JSON
        $response_body = wp_remote_retrieve_body($response);
        $data = json_decode($response_body);

        // Check if the response is valid JSON
        if ($data === null) {
            echo "Error: Invalid JSON response";
        } else {

            echo '<pre>'.print_r($data, true).'</pre>';
            /* Process the data
            foreach ($data as $item) {
                // Display or use the data as needed
                echo print_r($);
                echo "<p>Content: {$item->content}</p>";
            }
            */

        } // if

    }// if

} // Function