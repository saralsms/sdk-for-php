# SaralSMS SDK for PHP

The **SaralSMS SDK for PHP** makes it easy for developers to access SaralSMS API service in their PHP code, and build robust SMS based applications and software.

# Getting Started
1. **Sign up for SaralSMS** – Before you begin, you need to sign up for an SaralSMS account and retrieve your [Live Credentials] or [Sandbox Credentials].
2. **Minimum requirements** – To run the SDK, your system will need to meet the minimum requirements, including having **PHP >= 5.3**. We highly recommend having it compiled with the cURL extension and cURL compiled with a TLS backend (e.g., NSS or OpenSSL).

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
$client = new Client(array(
    'token' => 'f9c6......55c1',
    'is_sandbox'  => false // set `true` if you are testing
));
```

### Send Message
This will send the message to single number.

```php
$client->message->sendMessage('9841xx58', 'Text message to single number.');
```

### Send Bulk Message
This will send the message to multiple number.

```php
$client->message->sendBulkMessage(array('9841xx58', '9803xx65'), 'Text message to multiple number.');
```

### Account Balance
This will return the account balance on behalf of a authenticated token.

```php
$client->account->balance();
```

### Account Profile
This will return the user profile on behalf of a authenticated token.
     
```php
$client->account->profile();
```

### Report for MessageID
This will get message report based on Message ID.
     
```php
$client->report->getReportById(1234);
```

### Report for Identifier
This will get message report based on Message identifier.
     
```php
$client->report->getReportByIdentifier('d2e7......12k1');
```

### Report pages
This will get message report based on page number. Defaults to page `1`.
     
```php
$client->report->getReports(1);
```

[Live Credentials]: https://app.saralsms.com
[Sandbox Credentials]: https://demo.saralsms.com

[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/saralsms/sdk-for-php
