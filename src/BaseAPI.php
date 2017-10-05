<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 15:52
 */

require '../vendor/autoload.php';
use GuzzleHttp\Client;


class BaseAPI
{
    const TIME_OUT = 2.0;

    private $baseUri;
    private $apiKey;

    private $client;

    public function __construct(string $base_uri, string $api_key = NULL)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://httpbin.org',
            // You can set any number of default request options.
            'timeout'  => self::TIME_OUT,
        ]);
    }
}