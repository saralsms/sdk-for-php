# SaralSMS SDK for PHP

The **SaralSMS SDK for PHP** makes it easy for developers to access SaralSMS API service in their PHP code, and build robust SMS based applications and software.

# Getting Started
1. **Sign up for SaralSMS** – Before you begin, you need to sign up for an SaralSMS account and retrieve your [Credentials].
2. **Minimum requirements** – To run the SDK, your system will need to meet the minimum requirements, including having **PHP >= 7.3**. We highly recommend having it compiled with the cURL extension and cURL compiled with a TLS backend (e.g., NSS or OpenSSL).

# Installation
**Install the SDK** – Using [Composer] is the recommended way to install the SaralSMS SDK for PHP. The SDK is available via [Packagist] under the [`saralsms/sdk-for-php`][install-packagist] package.
```
composer require saralsms/sdk-for-php
```

## Getting Help
We use the GitHub issues for tracking bugs and feature requests and address them as quickly as possible.

* Call/Email [SaralSMS Support](https://saralsms.com/#contact) or open ticket in your dashboard.
* If it turns out that you may have found a bug, please [open an issue](https://github.com/saralsms/sdk-for-php/issues/new).

## Quick Examples

### Create a SaralSMS client

```php
// require the composer autoloader.
require 'vendor/autoload.php';

use SaralSMS\Client;

// instantiate a SaralSMS client.
$client = new Client('f9c6......55c1');
```

### Send Message
This will send the message to one or multiple numbers in an array.
```php
$client->send(['9851xxx123', '9801xxx456'], 'This is test message from API.');
```

Sample Response
```json
{
    "message": "2 messages queued for delivery."
}
```

### Credits
This will return the available credits and total messages sent.

```php
$client->getCredits();
```

Sample Response
```json
{
  "credits": 6584,
  "total_sent": 3416
}
```

### Reports
This will return historical messages reports including networks, charges and status.
     
```php
$pageNumber = 1;
$client->getReports($pageNumber);
```

Sample Response
```json
{
  "pages": 126,
  "data": [
    {
      "id": 56480058,
      "receiver": "9779851xxx123",
      "network": "ntc",
      "message": "Fruits are an excellent source of essential vitamins and minerals.",
      "api_credit": "1",
      "delivery_at": "2020-07-09 01:45:09"
    },
    {
      "id": 56480057,
      "receiver": "9779801xxx456",
      "network": "ncell",
      "message": "Vegetables are important sources of many nutrients, including potassium, dietary fiber.",
      "api_credit": "1",
      "delivery_at": "2020-07-08 07:25:31"
    }
  ]
}
```

[Credentials]: https://app.saralsms.com

[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/saralsms/sdk-for-php
