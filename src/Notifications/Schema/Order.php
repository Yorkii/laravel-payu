<?php

namespace Yorki\Payu\Notifications\Schema;

use Yorki\Payu\Schema\Buyer;
use Yorki\Payu\Schema\Products;

class Order
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_WAITING_FOR_CONFIRMATION = 'WAITING_FOR_CONFIRMATION';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELED = 'CANCELED';
    const STATUS_REJECTED = 'REJECTED';

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $orderCreateDate;

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
     * @var Buyer
     */
    protected $buyer;

    /**
     * @var PayMethod
     */
    protected $payMethod;

    /**
     * @var Products
     */
    protected $products;

    /**
     * @var string
     */
    protected $status;

    public function __construct()
    {
        $this->buyer = new Buyer();
        $this->payMethod = new PayMethod();
        $this->products = new Products();
    }

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
     * @return string
     */
    public function getOrderCreateDate()
    {
        return (string) $this->orderCreateDate;
    }

    /**
     * @param string $orderCreateDate
     *
     * @return $this
     */
    public function setOrderCreateDate($orderCreateDate)
    {
        $this->orderCreateDate = (string) $orderCreateDate;

        return $this;
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
     * @return Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     *
     * @return $this
     */
    public function setBuyer(Buyer $buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return PayMethod
     */
    public function getPayMethod()
    {
        return $this->payMethod;
    }

    /**
     * @param PayMethod $payMethod
     *
     * @return $this
     */
    public function setPayMethod(PayMethod $payMethod)
    {
        $this->payMethod = $payMethod;

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
     * @return string
     */
    public function getStatus()
    {
        return (string) $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = (string) $status;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'orderId' => $this->getOrderId(),
            'extOrderId' => $this->getExtOrderId(),
            'orderCreateDate' => $this->getOrderCreateDate(),
            'notifyUrl' => $this->getNotifyUrl(),
            'customerIp' => $this->getCustomerIp(),
            'merchantPosId' => $this->getMerchantPosId(),
            'description' => $this->getDescription(),
            'currencyCode' => $this->getCurrencyCode(),
            'totalAmount' => $this->getTotalAmount(),
            'buyer' => $this->getBuyer()->toArray(),
            'payMethod' => $this->getPayMethod()->toArray(),
            'products' => $this->getProducts()->toArray(),
            'status' => $this->getStatus(),
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
        $this->setExtOrderId(isset($data['extOrderId']) ? $data['extOrderId'] : null);
        $this->setOrderCreateDate(isset($data['orderCreateDate']) ? $data['orderCreateDate'] : null);
        $this->setNotifyUrl(isset($data['notifyUrl']) ? $data['notifyUrl'] : null);
        $this->setCustomerIp(isset($data['customerIp']) ? $data['customerIp'] : null);
        $this->setMerchantPosId(isset($data['merchantPosId']) ? $data['merchantPosId'] : null);
        $this->setDescription(isset($data['description']) ? $data['description'] : null);
        $this->setCurrencyCode(isset($data['currencyCode']) ? $data['currencyCode'] : null);
        $this->setTotalAmount(isset($data['totalAmount']) ? $data['totalAmount'] : null);
        $this->setStatus(isset($data['status']) ? $data['status'] : null);

        if (isset($data['buyer'])) {
            $this->buyer->fromArray($data['buyer']);
        }

        if (isset($data['payMethod'])) {
            $this->payMethod->fromArray($data['payMethod']);
        }

        if (isset($data['products'])) {
            $this->products->fromArray($data['products']);
        }

        return $this;
    }
}
