<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
$url = 'https://localhost/wordpress';
$ck = 'ck_1e7d2da8fb0b8c5dd422224fcfb15ba9f6f8af31';
$cs = 'cs_f62ccfac874b3239f3b7157b41f3d00e5b3a578d';
$woocommerce = new Client($url,$ck,$cs,
    [
        'wp_api' => true,
        'version' => 'wc/v2',
        'query_string_auth' => true
    ]
);