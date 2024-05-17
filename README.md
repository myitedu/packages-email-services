# Email-Services for Laravel
**Company**: MYITEDU.US

**Author**: Jon Toshmatov

Email-Services is a custom Laravel package designed to facilitate the handling and sending of emails based on dynamic input from a Laravel application. This package provides a straightforward way to manage email data storage and sending operations, all through an easy-to-use service provider and facade.

## Features

- Store email form data in a database.
- Send emails using Laravel's native email functionalities.
- Queue emails to enhance performance and user experience.
- Customizable email templates.

## Requirements

- PHP 7.4 or higher
- Laravel 8.0 or higher
- MySQL 5.7 or higher (or another compatible database system supported by Laravel)

## Installation

Follow these steps to install the Email-Services package in your Laravel project.

### Step 1: Composer

Run the following command in your project directory to add the Email-Services package:

```bash
composer require myitedu/email-services
```
## Automated Post-Installation Setup

To facilitate a seamless setup process for the `myitedu/email-services` package, you can automate the publishing of assets and running migrations by adding a custom script to your Laravel project's `composer.json`. This script will execute our provided Artisan command automatically after any update or installation, ensuring that your system is always configured correctly with minimal manual intervention.

### Adding the Script

To automate the setup, add the following lines to the `scripts` section of your project's `composer.json`:

```json
"scripts": {
    "post-update-cmd": [
        "@php artisan emailservices:install"
    ],
    "post-install-cmd": [
        "@php artisan emailservices:install"
    ]
}
```
Then run the composer update command again
```bash
composer update
```
