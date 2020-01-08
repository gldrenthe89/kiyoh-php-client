## Kiyoh PHP Client
for use in Laravel projects.

Currently only supported functions are shown below. New functions will be released in the future. Feel free to contribute and create a PR.

## Installation

You can install the library via composer:

```bash
composer require gldrenthe89/kiyoh-php-client
```

## Usage

Import class:
```php
use Gldrenthe89\KiyohPhpClient\KiyohApi;
```

For group statistics use:

```php
$baseUrl    = string // www.kiyoh.com or www.Klantenvertellen.nl';
$apiKey     = string // provided by accountmanager form Kiyoh;
$apiCall    = new KiyohApi($baseUrl, $apiKey);
$response   = $apiCall->getGroupStatistics();
```

For a per location statistics use:

```php
$baseUrl    = string  // www.kiyoh.com or www.Klantenvertellen.nl'.
$apiKey     = string  // provided by accountmanager form Kiyoh.
$locationId = integer // provided by accountmanager from Kiyoh of found in respective group dashboard.
$apiCall    = new KiyohApi($baseUrl, $apiKey);
$response   = $apiCall->getLocationStatistics($locationId);
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](LICENSE.md).
