PHP Laravel App Example
=======================

An example of a simple web application built in PHP w/
[Laravel](https://laravel.com/) and [Bootstrap](https://getbootstrap.com/).

Supports 
[PSR-1](https://www.php-fig.org/psr/psr-1/), 
[PSR-2](https://www.php-fig.org/psr/psr-2/), 
[PSR-4](https://www.php-fig.org/psr/psr-4/), and 
[PSR-12](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md).


#### Notes on Scope

This showcases a small slice of a theoretical larger application which would
 manage customers and their subscriptions to a hypothetical company's periodic 
 delivery service. This demo simply shows an example few pages within the app, 
 and does not include the user-facing site nor the login-related features. 

Instead this example focuses purely on customer management, 
 and highlights the use of forms and models in Laravel.


Setup/Usage
-----------

### Requirements

- PHP 7.1+
- Composer 1.6+
- NodeJS 9.0+
- NPM 6+ (or Yarn 1.10+)

### Local Development 

These instructions assume the above requirements are met and 
that commands are run from the root project directory.

```
php composer run local
npm install
npm run dev
php artisan serve
```

### Testing
```
composer run test
```
