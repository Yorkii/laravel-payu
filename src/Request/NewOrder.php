<?php

namespace Yorki\Payu\Request;

use Yorki\Payu\Client;
use Yorki\Payu\Request\Schema\Settings;
use Yorki\Payu\Response\Error;
use Yorki\Payu\Response\OrderCreated;
use Yorki\Payu\Response\Schema\Status;
use Yorki\Payu\Schema\Products;

class NewOrder extends Base
{
    const API_ENDPOINT = '/orders';
    const API_METHOD = 'POST';

    const CURRENCY_PLN = 'PLN';

    /**
     * @var string
     */
    protected $notifyUrl;

    /**
     * @var string
     */
    protected $customerIp;

    /**
     * @var int
     */
    protected $merchantPosId;

    /**
     * @var string
     */
    protected $extOrderId;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var int
     */
    protected $totalAmount;

    /**
     * @var Settings
     */
    protected $settings;

    /**
     * @var Products
     */
    protected $products;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->settings = new Settings();
        $this->products = new Products();
        $this->setNotifyUrl($client->getNotificationUrl());
        $this->setMerchantPosId($client->getPosId());
    }

    /**
     * @return string
     */
    public function getNotifyUrl()
    {
        return (string) $this->notifyUrl;
    }

    /**
     * @param string $notifyUrl
     *
     * @return $this
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = (string) $notifyUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerIp()
    {
        return (string) $this->customerIp;
    }

    /**
     * @param string $customerIp
     *
     * @return $this
     */
    public function setCustomerIp($customerIp)
    {
        $this->customerIp = (string) $customerIp;

        return $this;
    }

    /**
     * @return int
     */
    public function getMerchantPosId()
    {
        return (int) $this->merchantPosId;
    }

    /**
     * @param int $merchantPosId
     *
     * @return $this
     */
    public function setMerchantPosId($merchantPosId)
    {
        $this->merchantPosId = (int) $merchantPosId;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtOrderId()
    {
        return (string) $this->extOrderId;
    }

    /**
     * @param string $extOrderId
     *
     * @return $this
     */
    public function setExtOrderId($extOrderId)
    {
        $this->extOrderId = (string) $extOrderId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return (string) $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return (string) $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     *
     * @return $this
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = (string) $currencyCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAmount()
    {
        return (int) $this->totalAmount;
    }

    /**
     * @param int $totalAmount
     *
     * @return $this
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = (int) $totalAmount;

        return $this;
    }

    /**
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param Settings $settings
     *
     * @return $this
     */
    public function setSettings(Settings $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * @return Products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Products $products
     *
     * @return $this
     */
    public function setProducts(Products $products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [
            'notifyUrl' => $this->getNotifyUrl(),
            'customerIp' => $this->getCustomerIp(),
            'merchantPosId' => (string) $this->getMerchantPosId(),
            'extOrderId' => $this->getExtOrderId(),
            'description' => $this->getDescription(),
            'currencyCode' => $this->getCurrencyCode(),
            'totalAmount' => (string) $this->getTotalAmount(),
            'products' => $this->getProducts()->toArray(),
        ];

        if ($this->getSettings()->isModified()) {
            $data['settings'] = $this->getSettings()->toArray();
        }

        return $data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setNotifyUrl(isset($data['notifyUrl']) ? $data['notifyUrl'] : null);
        $this->setCustomerIp(isset($data['customerIp']) ? $data['customerIp'] : null);
        $this->setMerchantPosId(isset($data['merchantPosId']) ? $data['merchantPosId'] : null);
        $this->setExtOrderId(isset($data['extOrderId']) ? $data['extOrderId'] : null);
        $this->setDescription(isset($data['description']) ? $data['description'] : null);
        $this->setCurrencyCode(isset($data['currencyCode']) ? $data['currencyCode'] : null);
        $this->setTotalAmount(isset($data['totalAmount']) ? $data['totalAmount'] : null);

        if (isset($data['settings'])) {
            $this->settings->fromArray($data['settings']);
        }

        if (isset($data['products'])) {
            $this->products->fromArray($data['products']);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->toArray();
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

    public function send()
    {
        $res = parent::send();

        if (isset($res['status']['statusCode'])) {
            if ($res['status']['statusCode'] === Status::SUCCESS) {
                return (new OrderCreated())->fromArray($res);
            }
        }

        return (new Error())->fromArray($res);
    }
}
