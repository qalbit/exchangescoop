<?php

include_once(__DIR__ . '/vendor/autoload.php');

use ExchangeScoop\Exchange;

// Grab API Key from https://app.exchangerate-api.com/
$API_KEY = "YOUR_API_KEY";
$scoop = new Exchange($API_KEY);

// Set base currency
$scoop->setBaseCurrency("AUD");

// Get base currency
$base_currency = $scoop->getBaseCurrency();

// Get latest exchange rate
$exchange_rates = $scoop->getLatestExchangeRate();
print_r($exchange_rates);

// Convert your currency
$target_currency = "USD";
$amount_to_convert = 100;
$converted_amount = $scoop->convert($target_currency, $amount_to_convert);
print_r($converted_amount);