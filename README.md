# Laravel Coming Soon Package

The **Laravel Coming Soon** package provides a simple and customizable way to set up a "Coming Soon" page for your Laravel application. This page allows you to inform your visitors that your website is under construction and provide them with essential information about the launch date.

## Installation

To get started with the Laravel Coming Soon package, follow these steps:

### Step 1: Composer Install

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require tauseedzaman/laravel-coming-soon
```

### Step 2: Publish Configuration

Publish the package configuration file to customize settings according to your project requirements:

```bash
php artisan vendor:publish --tag=coming-soon-config
```

This command will generate a `coming-soon.php` configuration file in the `config` directory of your Laravel project.

### Step 3: Migrate the Database

Run the migration to create the necessary database table for managing the "Coming Soon" settings:

```bash
php artisan migrate
```

### Step 4: Set Up Your Configuration

Now, open the `config/coming-soon.php` configuration file and customize it according to your needs. You can set the title, description, launch date, and enable or disable the "Coming Soon" mode.

### Step 5: Protect Routes (Optional)

By default, the package will protect your entire site with a "Coming Soon" page. If you want to protect specific routes or actions, you can use middleware. Update your routes or controllers as needed.

```php
Route::middleware(['coming-soon'])->group(function () {
    // Define your protected routes here
});
```

### Step 6: Enable the "Coming Soon" Mode

To enable the "Coming Soon" mode and display the "Coming Soon" page, set the `COMING_SOON_ENABLED` environment variable to `true` in your `.env` file:

```
COMING_SOON_ENABLED=true
```

### Step 7: Customize the Views (Optional)

You can customize the "Coming Soon" page views by publishing them to your project:

```bash
php artisan vendor:publish --tag=coming-soon-views
```

This command will copy the views to the `resources/views/vendor/coming-soon` directory, allowing you to modify them as needed.

### Step 8: Launch Your Application

Once you have configured and customized the "Coming Soon" package to your liking, you can launch your Laravel application. Your visitors will see the "Coming Soon" page until the launch date arrives.

## License

This package is open-source software licensed under the [MIT license](LICENSE).

## Support

If you encounter any issues or have questions about using this package, please feel free to [open an issue](https://github.com/tauseedzaman/laravel-coming-soon/issues) on GitHub.

## Credits

This package is created and maintained by [tauseedzaman](https://github.com/tauseedzaman).

Thank you for using Laravel Coming Soon!
```