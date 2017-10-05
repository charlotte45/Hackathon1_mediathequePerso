<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 05/10/17
 * Time: 21:03
 */

namespace Wcs;

class API  extends BaseApi
{
    public function  __construct($base_uri, $api_key = NULL, $apikey_name = NULL, array $headers = NULL)
    {
        parent::__construct($base_uri, $api_key, $apikey_name, $headers);
    }
}