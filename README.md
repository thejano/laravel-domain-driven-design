# Laravel Domain Driven Design

[![Latest Version on Packagist](https://img.shields.io/packagist/v/thejano/laravel-domain-driven-design.svg?style=flat-square)](https://packagist.org/packages/thejano/laravel-domain-driven-design)
[![GitHub Code Style Action Status](https://github.com/thejano/laravel-domain-driven-design/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/thejano/laravel-domain-driven-design/actions/workflows/php-cs-fixer.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/thejano/laravel-domain-driven-design.svg?style=flat-square)](https://packagist.org/packages/thejano/laravel-domain-driven-design)


[Domain-Driven Design](https://en.wikipedia.org/wiki/Domain-driven_design) (DDD) is a software development approach that emphasizes understanding and modeling the business domain. The goal is to create software that aligns with the needs of the business and is easier to maintain. DDD uses concepts such as bounded contexts, entity modeling, and ubiquitous language to create robust and maintainable software architecture.

This package helps you to create domains within your Laravel application. It provides a set of artisan command to generate Models, Controllers, Actions, Services and more.

<br>
You create an Album domain just by running

```shell
php artisan d:create Album
```

It would create a domain inside `app` folder under `Domain/Album` folder.
Also, it would generate the following scaffold:

```shell
|____app
| |____ Domain
| | |____ Album
| | | |____ Models
| | | |____ Exceptions
| | | |____ Policies
| | | |____ Http
| | | | |____ Middleware
| | | | |____ Resources
| | | | |____ Requests
| | | | |____ Controllers
| | | |____ Actions
| | | |____ Jobs
| | | |____ Events
| | | |____ Data
| | | |____ Observers
| | | |____ Listeners
| | | |____ Services
```
## Installation and Usage

Please, check the documentation below to install and use the package

https://ddd.thejano.com


### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email drpshtiwan@thejano.com instead of using the issue tracker.

## Credits

-   [Dr Pshtiwan](https://github.com/drpshtiwan)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
