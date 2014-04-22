PHP Composer Package Base
===

__Notice: This an alpha-quality software at the moment. Do NOT use in production anything!!__

This repository is meant to be a blank composer package template with a few configuration niceties
already established. This includes integrated "support" for PHPUnit, Travis CI, Composer, and more.
Even this README.md could serve as a template for your own package documentation. Just add/remove sections
as needed.

## Goals

* Bootstrap the process of creating a composer package.

This package is compliant with [PSR-1][], [PSR-2][] and [PSR-4][]. If you
notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

## Install

Via Composer

``` json
{
    "require": {
        "vendor/package": "dev-master"
    }
}
```

## Requirements

The following versions of PHP are supported by this version.

* PHP 5.3
* PHP 5.4
* PHP 5.5

## Documentation

It is typical to include documentation about folks use the packages you write… my work here is done.

``` php
// Handle some business
```

## Todo

- [ ] Add usage documentation.
- [ ] Substitute all references of `vendor/package` with your own.
- [ ] Update list of supported PHP versions.
- [ ] Add your own flair!

## Testing

``` bash
$ phpunit
```

## Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/vendor/package).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the README and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow semver. Randomly breaking public APIs is not an option.

- **Create topic branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.

## Running Tests

``` bash
$ phpunit
```

**Happy coding**!

## Credits

- [Phil Sturgeon](https://github.com/philsturgeon) for documentation format. Stole!

## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.