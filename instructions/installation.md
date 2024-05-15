# Installation Instructions for myitedu/email-services

This document provides instructions on how to install the `myitedu/email-services` package in your Laravel application. This package helps manage email services seamlessly within Laravel projects.

## Requirements

- PHP 8.2 or higher
- Laravel 11.0 or higher

## Installation

Follow these steps to install the `myitedu/email-services` package in your Laravel application.

### Publish Configuration (Optional)

```bash
php artisan vendor:publish --provider="Myitedu\EmailServices\ServiceProvider"
```

### Step 1: Composer Dependency

To install this package, run the following Composer command in the terminal at the root of your Laravel project:

```bash
composer require myitedu/email-services
```
### Environment Configuration
After installation, you may need to add specific environment variables to your .env file. Examples include

```bash
EMAIL_SERVICE_API_KEY=your_api_key_here
EMAIL_SERVICE_ENDPOINT=your_endpoint_here
```
### Usage
To use the package, you can refer to the following basic example. Make sure to consult the package's documentation for more detailed usage.
```bash
use Myitedu\EmailServices\EmailManager;

$emailManager = new EmailManager();
$emailManager->send('example@example.com', 'Subject', 'Message body');
```
