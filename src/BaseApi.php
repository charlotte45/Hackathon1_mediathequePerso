<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 15:52
 */
namespace Wcs;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class BaseApi
{
    const TIME_OUT = 8.0;

    private $apiKey_name;
    private $apiKey;
    private $baseUri;
    private $client;
    private $headers = NULL;
    private $searchUri = '';
    private $getUriFromId = '';

    public function __construct(string $base_uri, string $api_key = NULL, string $apikey_name = NULL, array $headers = NULL)
    {
        if (!empty($api_key)) {
            $this->apiKey = $api_key;
            $this->apiKey_name = $apikey_name;
        }

        $this->baseUri = $base_uri;

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $base_uri,
            // You can set any number of default request options.
            'timeout'  => self::TIME_OUT,
        ]);

        if (!empty($headers)) {
            $this->headers = $headers;
        }
    }

    public function sendRequest(string $method, string $uri)
    {
        $finalUri = $uri;
        if (!empty($this->apiKey)) {
            $finalUri = $uri . '&' . $this->apiKey_name . '=' . $this->apiKey;
        }

        $request = NULL;
        if (!empty($this->headers)) {
            $request = new Request($method, $finalUri, $this->headers);
        } else {
            $request = new Request($method, $finalUri);
        }

        $response = '';

        try {
            $response = $this->client->send($request);
        } catch (\Exception $ex) {
            echo 'GuzzleHttp error:' . $ex->getMessage();
        }

        if (empty($response)) {
            return '';
        }

        if (200 != $response->getStatusCode())
        {
            throw new \Exception("Error $response->getStatusCode(), $response->getReasonPhrase()");
        }

        $contents = $response->getBody()->getContents();

        return \GuzzleHttp\json_decode($contents);
    }

    /**
     * @param string $searchUri
     */
    public function setSearchUri(string $searchUri)
    {
        $this->searchUri = $searchUri;
    }

    /**
     * @param string $getUriFromId
     */
    public function setGetUriFromId(string $getUriFromId)
    {
        $this->getUriFromId = $getUriFromId;
    }

    public function search($therm)
    {
        $finalUri = str_replace('%THERM%', $therm, $this->searchUri);
        return $this->sendRequest('GET', $finalUri);
    }

    public function getInfosFromID(string  $id)
    {
        $finalUri = str_replace('%ID%', $id, $this->getUriFromId);
        return $this->sendRequest('GET', $finalUri);
    }
}
