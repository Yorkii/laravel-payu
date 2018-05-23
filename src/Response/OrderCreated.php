<?php

namespace Yorki\Payu\Response;

use Yorki\Payu\Response\Schema\Status;

class OrderCreated extends Base
{
    /**
     * @var Status
     */
    protected $status;

    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $extOrderId;

    public function __construct()
    {
        $this->status = new Status();
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     *
     * @return $this
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return (string) $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     *
     * @return $this
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = (string) $redirectUri;

        return $this;
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
     * @return array
     */
    public function toArray()
    {
        return [
            'status' => $this->getStatus()->toArray(),
            'redirectUri' => $this->getRedirectUri(),
            'orderId' => $this->getOrderId(),
            'extOrderId' => $this->getExtOrderId(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        if (isset($data['status'])) {
            $this->getStatus()->fromArray($data['status']);
        }

        $this->setRedirectUri(isset($data['redirectUri']) ? $data['redirectUri'] : null);
        $this->setOrderId(isset($data['orderId']) ? $data['orderId'] : null);
        $this->setExtOrderId(isset($data['extOrderId']) ? $data['extOrderId'] : null);

        return $this;
    }
}
