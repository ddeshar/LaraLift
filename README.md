# LaraLift

LaraLift is a Laravel code version updater application that helps you upgrade your Laravel code to the latest version.

## Features

- Code upload: You can upload your Laravel code to the application or provide a repository link.
- Version detection: The application detects the version of Laravel that your code is currently using.
- Version selection: You can select which version of Laravel you want to update your code to.
- Compatibility check: The application checks if your code is compatible with the selected version of Laravel and provides a compatibility report.
- Automated update: The application automatically updates your code to the selected version of Laravel, making any necessary changes or modifications to ensure that your code continues to work correctly.
- Change tracking: The application tracks and comments on all changes made to your code during the update process, so you can see exactly what has been done.
- Error reporting: If any errors are encountered during the update process, the application provides detailed error reports.
- Version history: The application maintains a history of all the updates performed on your code, so you can easily see which version you are currently on and what changes have been made.
- Rollback option: You can roll back to a previous version of Laravel if you encounter any issues with the updated code.
- Repository integration: You can provide a repository link, and the application will pull your code from the repository, update it, and then push the updated version back to the repository.

## Requirements

- PHP 7.3 or later
- Laravel 10.x
- A database system (MySQL, PostgreSQL, SQLite, etc.)

## Installation

1. Clone the repository: `git clone https://github.com/ddeshar/LaraLift.git`
2. Install the dependencies: `composer install`
3. Create a `.env` file and configure the database connection.
4. Run the migrations: `php artisan migrate`
5. Serve the application: `php artisan serve`

## Contributing

If you want to contribute to the LaraLift project, please read the [CONTRIBUTING.md](CONTRIBUTING.md) file for more information.

## License

LaraLift is open-sourced software licensed under the [MIT license](LICENSE).

## Contact

If you have any questions or feedback, please contact us at [jedeshar@gmail.com].
