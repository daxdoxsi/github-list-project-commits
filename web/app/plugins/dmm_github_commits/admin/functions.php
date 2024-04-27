<?php

function dmm_github_commits_admin_menu_item(){
    add_plugins_page(
        'GitHub Commits List Settings',
        'GitHub Commits List Settings',
        'manage_options',
        'dmm_github_commits_settings',
        'dmm_github_commits_settings_page',
      null
    );
}

function dmm_github_commits_settings_page(){
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?=esc_html( get_admin_page_title() )?></h1>
    </div>
    <form action="options.php" method="post">
        <?php
            settings_fields('dmm_github_commits_page');
            do_settings_sections('dmm_github_commits_page');
            submit_button('Save Settings');
        ?>
    </form>
    <?php
}

function dmm_github_commits_register_settings_section(){

    add_settings_section(
        'dmm_github_commits_config_settings_section',
        'API integration settings',
        'dmm_github_commits_build_config_settings_section',
        'dmm_github_commits_page',
        [
            'before_section' => '<section class="%s">',
            'after_section' => '</section>',
            'section_class' => 'github-commits-settings-section'
        ]
    );

    register_setting('dmm_github_commits_page', 'dmm_github_commits_username');

    add_settings_field(
        'dmm_github_commits_username',
        'GitHub Username',
        'dmm_github_commits_build_username_field',
        'dmm_github_commits_page',
        'dmm_github_commits_config_settings_section',
        [
            'label_for' => 'dmm_github_commits_username',
        ]
    );

    register_setting('dmm_github_commits_page', 'dmm_github_commits_repository');
    add_settings_field(
        'dmm_github_commits_repository',
        'Repository Name',
        'dmm_github_commits_build_repository_field',
        'dmm_github_commits_page',
        'dmm_github_commits_config_settings_section',
        [
            'label_for' => 'dmm_github_commits_repository',
        ]
    );

    register_setting('dmm_github_commits_page', 'dmm_github_commits_token');

    add_settings_field(
        'dmm_github_commits_token',
        'Personal Token',
        'dmm_github_commits_build_token_field',
        'dmm_github_commits_page',
        'dmm_github_commits_config_settings_section',
        [
            'label_for' => 'dmm_github_commits_token',
        ]
    );
}

function dmm_github_commits_build_username_field(){
    $current_value = get_option('dmm_github_commits_username','');
    ?>
    <input type="text" name="dmm_github_commits_username" id="dmm_github_commits_username" value="<?=$current_value?>" />
    <?php
}

function dmm_github_commits_build_repository_field(){
    $current_value = get_option('dmm_github_commits_repository','');
    ?>
    <input type="text" name="dmm_github_commits_repository" id="dmm_github_commits_repository" value="<?=$current_value?>" />
    <?php
}

function dmm_github_commits_build_token_field(){
    $current_value = get_option('dmm_github_commits_token','');
    ?>
    <input type="text" name="dmm_github_commits_token" id="dmm_github_commits_token" value="<?=$current_value?>" />
    <?php
}




