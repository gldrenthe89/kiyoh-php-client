## Installation

You can install the library via composer:

```bash
composer require gldrenthe89/kiyoh-php-client
```

## Usage

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
