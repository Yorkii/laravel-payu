<?php

namespace Yorki\Payu\Notifications;

use Yorki\Payu\Notifications\Schema\Refund as RefundSchema;

class Refund extends Base
{
    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $extOrderId;

    /**
     * @var RefundSchema
     */
    protected $refund;

    public function __construct()
    {
        $this->refund = new RefundSchema();
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
     * @return RefundSchema
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param RefundSchema $refund
     *
     * @return $this
     */
    public function setRefund(RefundSchema $refund)
    {
        $this->refund = $refund;

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
            'refund' => $this->getRefund()->toArray(),
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

        if (isset($data['refund'])) {
            $this->getRefund()->fromArray($data['refund']);
        }

        return $this;
    }
}
