# Deploy Laravel on Vercel

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/davidgrzyb/deploy-laravel-on-vercel.svg?style=flat-square)](https://packagist.org/packages/davidgrzyb/deploy-laravel-on-vercel)
[![Total Downloads](https://img.shields.io/packagist/dt/davidgrzyb/deploy-laravel-on-vercel.svg?style=flat-square)](https://packagist.org/packages/davidgrzyb/deploy-laravel-on-vercel)
![GitHub Actions](https://github.com/davidgrzyb/deploy-laravel-on-vercel/actions/workflows/main.yml/badge.svg) -->

**This is a packaged version of [Caleb Porzio's blog post](https://calebporzio.com/easy-free-serverless-laravel-with-vercel) detailing the process of deploying Laravel to serverless Vercel.**

This package publishes the `api/index.php`, `vercel.json` & `.vercelignore` files required for deploying Laravel to Vercel. The PHP version can be changed by `vercel-php` runtime within the `vercel.json` file. The default version is `0.4.0`.

## Installation

You can install the package via composer as a dev dependency:

```bash
composer require davidgrzyb/deploy-laravel-on-vercel --dev
```

## Publishing Assets

The installation command can be run to publish and republish the required files.

```bash
php artisan deploy-laravel-on-vercel:install
```

Once the assets have been published, the package can be removed.

```bash
composer remove davidgrzyb/deploy-laravel-on-vercel --dev
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email grzybdavid@gmail.com instead of using the issue tracker.

## Credits

-   [David Grzyb](https://github.com/davidgrzyb)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
