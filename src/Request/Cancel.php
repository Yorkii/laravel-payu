<?php

namespace Yorki\Payu\Request;

class Cancel extends Base
{
    const API_ENDPOINT = '/orders/%id%';
    const API_METHOD = 'DELETE';

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return (string) $this->orderId;
    }

    /**
     * @param string $orderId
     *
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = (string) $orderId;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'orderId' => $this->getOrderId(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setOrderId(isset($data['orderId']) ? $data['orderId'] : null);

        return $this;
    }

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
        return str_replace('%id%', $this->getOrderId(), self::API_ENDPOINT);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::API_METHOD;
    }
}
