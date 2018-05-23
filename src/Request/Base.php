<?php

namespace Yorki\Payu\Request;

use Yorki\Payu\Client;

abstract class Base
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send()
    {
        return $this->client->send($this);
    }

    /**
     * @return array
     */
    abstract public function getData();

    /**
     * @return string
     */
    abstract public function getEndpoint();

    /**
     * @return string
     */
    abstract public function getMethod();
}
