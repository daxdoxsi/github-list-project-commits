<?php

function dmm_github_commits_api_connection()
{
    $token = get_option('dmm_github_commits_token','');
    $user = get_option('dmm_github_commits_username','');
    $repo = get_option('dmm_github_commits_repository','');

    // Define the URL of the REST API endpoint you want to read from
    $api_url = 'https://api.github.com/repos/' . $user . '/' . $repo . '/commits';

    // Set up the arguments for the request
    $args = array(
        'timeout' => 20,
        'headers' => array(
            'Accept' => 'application/vnd.github.v3+json',
            'Authorization' => 'Bearer ' . $token,
            // Add any other headers if needed
        ),
        // Add any other request parameters such as 'method', 'body', 'cookies', 'sslverify', etc.
    );

    // Make the REST API request
    $response = wp_remote_get($api_url, $args);

    // Check if the request was successful
    if (is_wp_error($response)) {

		// Getting error details
		$error_message = $response->get_error_message();
        echo "Error: $error_message";
		return false;

    } else {

		// Retrieve the response body and decode it as JSON
        $response_body = wp_remote_retrieve_body($response);
        $data = json_decode($response_body);

        // Check if the response is valid JSON
        if ($data === null) {

            return false;

        }

		return $data;

    }// if

} // Function
