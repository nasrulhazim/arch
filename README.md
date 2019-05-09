[![Build Status](https://dev.azure.com/nasrulhazim/arch/_apis/build/status/nasrulhazim.arch?branchName=master)](https://dev.azure.com/nasrulhazim/arch/_build/latest?definitionId=4&branchName=master)

## Arch 

Arch is a pre-build admin panel for web application.

## Table of Content

* [Version Compatibility](#version-compatibility)
* [Quick Installation](#quick-installation)
* [Contributing to the Arch](#contributing-to-the-arch)
* [Security](#security-vulnerabilities)
* [License](#license)

## Version Compatibility

Laravel    | Arch
:----------|:----------
 5.8.x     | 1.1.x

## Quick Installation

```
$ composer create-project nasrulhazim/arch project-name --prefer-dist
```

## Development

### Available artisan commands for development

Reload all caches:

```
$ php artisan reload:cache
```

Reload database and seed:

```
$ php artisan reload:db
```

Seed development data:

```
$ php artisan seed:dev
```

Create transformer class:

```
$ php artisan make:transformer UserTransformer Models\\User
```

Create datatable class:

```
$ php artisan make:dt UserDt Models\\User Datatable\\UserTransformer
```

## Contributing to the Arch

Contributions can be made to the Arch's respective component repositories:

- [Blade Plus Plus](https://github.com/cleaniquecoders/blade-plus-plus)
- [Blueprint Macro](https://github.com/cleaniquecoders/blueprint-macro)
- [Profile](https://github.com/cleaniquecoders/profile)
- [Laravel Helper](https://github.com/cleaniquecoders/laravel-helper)
- [Laravel Observers](https://github.com/cleaniquecoders/laravel-observers)

## Security Vulnerabilities

If you discover a security vulnerability within Arch, please send an e-mail to nasrulhazim.m@gmail.com. All security vulnerabilities will be promptly addressed.

## License

* The Laravel PHP Framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) by [Taylor Otwell](https://github.com/taylorotwell).
* The Arch is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
