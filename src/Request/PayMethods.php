<?php

namespace Yorki\Payu\Request;

class PayMethods extends Base
{
    const API_ENDPOINT = '/paymethods';
    const API_METHOD = 'GET';

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return self::API_ENDPOINT;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::API_METHOD;
    }
}
