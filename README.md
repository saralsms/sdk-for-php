# SaralSMS SDK for PHP

The **SaralSMS SDK for PHP** makes it easy for developers to access SaralSMS API service in their PHP code, and build robust SMS based applications and software.

# Getting Started
1. **Sign up for SaralSMS** – Before you begin, you need to sign up for an SaralSMS account and retrieve your [Live Credentials] or [Sandbox Credentials].
2. **Minimum requirements** – To run the SDK, your system will need to meet the minimum requirements, including having **PHP >= 5.4**. We highly recommend having it compiled with the cURL extension and cURL compiled with a TLS backend (e.g., NSS or OpenSSL).

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
$client = new Client([
    'token' => 'f9c6......55c1',
    'is_sandbox'  => false // set `true` if you are testing
]);
```

### Send Message
This will send the message to single number.

```php
$client->message->sendMessage('9841xx58', 'Text message to single number.');
```

Sample Response

```json
{
    "message": "The message has been queued for delivery.",
    "identifier": "1586148838....c662b1d290"
}
```

### Send Bulk Message
This will send the message to multiple number.

```php
$client->message->sendBulkMessage(['9841xx58', '9803xx65'], 'Text message to multiple number.');
```

Sample Response

```json
{
    "message": "The message has been queued for delivery.",
    "identifier": "15861488....587ff8be6c84fe5bc"
}
```

### Account Balance
This will return the account balance on behalf of a authenticated token.

```php
$client->account->balance();
```

Sample Response
```json
4996.25
```

### Account Profile
This will return the user profile on behalf of a authenticated token.
     
```php
$client->account->profile();
```

Sample Response
```json
{
    "id": 4,
    "role_id": 2,
    "provider": "SYSTEM",
    "organization_name": "John, Inc.",
    "registration_number": "2345678",
    "pan_number": 324567,
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@doe.com",
    "token": "69d8xxx34ba8",
    "phone": "9817xxx124",
    "address": "Kathmandu, Nepal",
    "photo_url": "https://sandboxcdn.saralsms.com/1578888813_5e124812771c4_82481270.png",
    "description": null,
    "remark": null,
    "last_online": "1 week ago",
    "is_active": 1,
    "is_email_verified": 1,
    "is_phone_verified": 0,
    "is_kyc_verified": 1,
    "created_at": "2020-01-07T10:08:18.000000Z",
    "sender_id_ntc": "SaralSMS",
    "sender_id_ncell": "SaralSMS",
    "sender_id_smartcell": "SaralSMS",
    "amount": "4996.25",
    "rate": "1.25",
    "role": "USER_ADMIN"
}
```

### Report for MessageID
This will get message report based on Message ID.
     
```php
$client->report->getReportById(1234);
```

### Report for Identifier
This will get message report based on Message identifier.
     
```php
$client->report->getReportByIdentifier('1586148875eb9...f8be6c84fe5bc');
```

Sample Response

```json
{
    "identifier": "1586148875eb9...f8be6c84fe5bc",
    "body": "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
    "sender_name": "John Doe",
    "queued_at": "2020-04-06 04:54:35",
    "created_at": "2020-04-06T04:54:35.000000Z",
    "contacts": [
        {
            "name": null,
            "phone": "981xxx6123"
        },
        ...
    ],
    "recipients": [
        {
            "id": 55,
            "identifier": "1586148875eb9....f8be6c84fe5bc",
            "phone": "9817...123",
            "receiver_name": null,
            "name": null,
            "status": "DELIVERED",
            "created_at": "2020-04-06T04:54:35.000000Z",
            "status_date": "2020-04-06 04:54:35",
            "remark": null
        },
        ...
    ]
}
```

[Live Credentials]: https://app.saralsms.com
[Sandbox Credentials]: https://sandbox.saralsms.com

[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/saralsms/sdk-for-php
