Phumbor for Laravel >= 5.* or
=====================

This Laravel package adds support for [the 99designs PHP interface](https://github.com/99designs/phumbor) to the [globocom Thumbor thumbnail service](https://github.com/globocom/thumbor).

Installation
------------

Simply require the package in your `composer.json` file:

    composer require brokenice/laravel-phumbor

Now, publish the package's config file:

    php artisan vendor:publish --tag=phumbor

which will publish the default configuration file to `app/config/phumbor.php`.

You should modify this file to reflect your Thumbor installation's URL and secret key.

Usage
-----

The `Phumbor` facade exposes the API from [the 99designs PHP interface](https://github.com/99designs/phumbor).

For example:

    Phumbor::url('http://images.example.com/llamas.jpg')
	    ->fitIn(640, 480)
		->addFilter('fill', 'green');

License
-------

Licensed under the MIT license. See <https://github.com/lucabecchetti/laravel-phumbor/blob/master/LICENSE>
