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
$apiKey     = string // provided by accountmanager from Kiyoh;
$apiCall    = new KiyohApi($baseUrl, $apiKey);
$response   = $apiCall->getGroupStatistics();
```

For a per location statistics use:

```php
$baseUrl    = string  // www.kiyoh.com or www.Klantenvertellen.nl'.
$apiKey     = string  // provided by accountmanager from Kiyoh.
$locationId = integer // provided by accountmanager from Kiyoh of found in respective group dashboard.
$apiCall    = new KiyohApi($baseUrl, $apiKey);
$response   = $apiCall->getLocationStatistics($locationId);
```

Send a review invite:
when response has error exception is thrown.
```php
$baseUrl            =   string // www.kiyoh.com or www.Klantenvertellen.nl';
$inviteApiKey       =   string // API key (token) to authorize the request, found in respective group dashboard;
$params             =   [
    'location_id'       =>      integer   // ID for the location for which the invite should be sent,
    'invite_email'      =>      string    // email address that should receive the invite,
    'delay'             =>      integer   // number of days after which the email should be sent. 0 is immediately,
    'first_name'        =>      string    // name fields to personalize the invite,
    'last_name'         =>      string    // name fields to personalize the invite,
    'language'          =>      string    // language the invite email is sent, “nl” for Dutch (case sensitive)
    'ref_code'          =>      string    // internal reference code which can be used for administration purposes (the reference code is visible in invite history, review exports and XML feed)
];
$apiCall            =   new KiyohApi($baseUrl, $inviteApiKey);
$response           =   $apiCall->sendReviewInviteJson($params);
```

## License

The Kiyoh PHP Client is open-sourced software licensed under the [MIT license](LICENSE.md).
