InCommon CM SSL Web Service Client Command-line Utility
===

Command-line Utility for InCommon Certificate Manager SSL Web Service API

[![Latest Stable Version](https://poser.pugx.org/mdwheele/incommon-cli/v/stable.png)](https://packagist.org/packages/mdwheele/incommon-cli)
[![Total Downloads](https://poser.pugx.org/mdwheele/incommon-cli/downloads.png)](https://packagist.org/packages/mdwheele/incommon-cli)
[![License](https://poser.pugx.org/mdwheele/incommon-cli/license.png)](https://packagist.org/packages/mdwheele/incommon-cli)

__Notice: This an alpha-quality software at the moment. Do NOT use in production anything!!__

This utility provides an access layer to limited functionality of the InCommon Certificate Manager SSL SOAP Web
Service.

## Goals

* Provide a command-line interface for performing bulk CSR enrollments and Certificate retrieval.

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
        "mdwheele/incommon-cli": "dev-master"
    }
}
```

## Requirements

The following versions of PHP are supported by this version.

* PHP 5.3
* PHP 5.4
* PHP 5.5

## Usage

This is a Symfony Console application. To get everything set up, you will need to clone down the project and
run `composer install`.

To run the thing, you'll need to run `bin/incommon`. This is the entry point for all the registered commands.

### Enroll Certs (Sending off the CSRs)

Enrolling certs requires a directory full of CSRs. You will provide this as a CLI argument.

```bash
[vagrant@kraken incommon-cli]$ bin/incommon help cert:enroll
Usage:
 cert:enroll [csr_paths1] ... [csr_pathsN]

Arguments:
 csr_paths             Paths to CSR files.
```

After running, it's going to go through some interactive prompts; asking for your InCommon login credentials as well
as the organization identifer and secret key.

After setting all that up, it'll just go to town.

### Check status of enrolled certs

### Download certs

## Documentation

I will have much more documentation coming soon.  Until then, this is basically it.

## Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/mdwheele/incomon-cli/pulls).

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

The MIT License (MIT). Please see [License File](LICENSE) for more information.