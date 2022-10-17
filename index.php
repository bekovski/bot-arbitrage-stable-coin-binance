<?php

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;
use Binance\API;
use Binance\RateLimiter;

Dotenv::create(__DIR__)->load();

$key    = getenv('KEY');
$secret = getenv('SECRET');

$api = new API($key, $secret);
$api->useServerTime();
$api = new RateLimiter($api);

try {
    $balances = $api->balances();

    $usdt = $balances['USDT'];

    print_r($usdt);
} catch (Exception $e) {

    print("\033[91mERROR.\033[0m" . PHP_EOL);

    print_r($e);
}
