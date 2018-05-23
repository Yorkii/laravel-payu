<?php

namespace Yorki\Payu\Request;

class Refund extends Base
{
    const API_ENDPOINT = '/orders/%id%/refunds';
    const API_METHOD = 'POST';

    const ERROR_TRANS_NOT_ENDED = 'TRANS_NOT_ENDED';
    const ERROR_NO_BALANCE = 'NO_BALANCE';
    const ERROR_AMOUNT_TO_BIG = 'AMOUNT_TO_BIG';
    const ERROR_AMOUNT_TO_SMALL = 'AMOUNT_TO_SMALL';
    const ERROR_REFUND_DISABLED = 'REFUND_DISABLED';
    const ERROR_REFUND_TO_OFTEN = 'REFUND_TO_OFTEN';
    const ERROR_PAID = 'PAID';
    const ERROR_UNKNOWN_ERROR = 'UNKNOWN_ERROR';
    const ERROR_REFUND_IDEMPOTENCY_MISMATCH = 'REFUND_IDEMPOTENCY_MISMATCH';
    const ERROR_TRANS_BILLING_ENTRIES_NOT_COMPLETED = 'TRANS_BILLING_ENTRIES_NOT_COMPLETED';

    /**
     * @var string
     */
    protected $refundDescription;

    /**
     * @var int
     */
    protected $orderId;

    /**
     * @return string
     */
    public function getRefundDescription()
    {
        return (string) $this->refundDescription;
    }

    /**
     * @param string $refundDescription
     *
     * @return $this
     */
    public function setRefundDescription($refundDescription)
    {
        $this->refundDescription = (string) $refundDescription;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->orderId;
    }

    /**
     * @param int $orderId
     *
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = (int) $orderId;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'refund' => [
                'description' => $this->getRefundDescription(),
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setRefundDescription(isset($data['refund']['description']) ? $data['refund']['description'] : null);

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
