<h1 align="center">
    Wordpress Take-Home Test
</h1>

## Instructions

This project is based on Bedrock that is a WordPress boilerplate for developers that want to manage their projects with Git and Composer. Following the steps to run the project in your local environment:

- Clone the repository: git@github.com:daxdoxsi/github-list-project-commits.git github-commits
- Run the following command in the root directory of the repository cloned in the previous step: composer install
- Copy the file .env.example as .env and update the database credentials of a new database
- Setup and enable the site in the Apache2 server
- Go to the browser and load the URL as per the configuration in Apache.
- Complete the Wordpress installation and log into the Administration Panel
- Go to the Plug-ins install option and active the GitHub Commits List
- Over the Setting section in the left navigation you should see the menu item to configure the GitHub API parameters. Here are some parameter for testing purposes:
  - GitHub Username: daxdoxsi
  - Repository name: github-list-project-commits
  - Personal Token:  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
- Once you complete the parameters required in previous you should be able to display the commits from the user, repository and token provided.
- Just in case that you get an error message, please double check the parameters from the configuration page.
