# Exchangescoop
A simple PHP library to convert and get latest exchange rate from Exchange Rate API.

## Requirements
PHP 5.6.0 and later.

## Composer
You can install the bindings via [Composer](https://getcomposer.org/). Run the following command:
```php
composer require qalbit/exchangescoop
```
To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):
```php
require_once('vendor/autoload.php');
```

## Dependencies
The bindings require the following extensions in order to work properly:
* [curl](https://www.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer

## Getting Started
Simple example looks like:
```php
$scoop = new Exchange("YOUR_EXCHANGE_RATE_API_KEY");

// Set base currency
$scoop->setBaseCurrency("AUD");

// Get latest exchange rate
$exchange_rates = $scoop->getLatestExchangeRate();
print_r($exchange_rates);
```

Convert currency
```php
// Convert your currency
$target_currency = "USD";
$amount_to_convert = 100;
$converted_amount = $scoop->convert($target_currency, $amount_to_convert);
print_r($converted_amount);
```

## Author
* Abidhusain Chidi
* abidhusain@qalbit.com
* [QalbIT](https://www.qalbit.com)

## Licensing & Support
Copyright © QalbIT Solution<br>
Licensed under the MIT license.

