<?php

namespace Yorki\Payu\Notifications\Schema;

class Refund
{
    /**
     * @var int
     */
    protected $refundId;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $statusDateTime;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var string
     */
    protected $reasonDescription;

    /**
     * @var string
     */
    protected $refundDate;

    /**
     * @return int
     */
    public function getRefundId()
    {
        return (int) $this->refundId;
    }

    /**
     * @param int $refundId
     *
     * @return $this
     */
    public function setRefundId($refundId)
    {
        $this->refundId = (int) $refundId;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return (int) $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = (int) $amount;

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
     * @return string
     */
    public function getStatusDateTime()
    {
        return (string) $this->statusDateTime;
    }

    /**
     * @param string $statusDateTime
     *
     * @return $this
     */
    public function setStatusDateTime($statusDateTime)
    {
        $this->statusDateTime = (string) $statusDateTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return (string) $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = (string) $reason;

        return $this;
    }

    /**
     * @return string
     */
    public function getReasonDescription()
    {
        return (string) $this->reasonDescription;
    }

    /**
     * @param string $reasonDescription
     *
     * @return $this
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = (string) $reasonDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getRefundDate()
    {
        return (string) $this->refundDate;
    }

    /**
     * @param string $refundDate
     *
     * @return $this
     */
    public function setRefundDate($refundDate)
    {
        $this->refundDate = (string) $refundDate;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'refundId' => $this->getRefundId(),
            'amount' => $this->getAmount(),
            'currencyCode' => $this->getCurrencyCode(),
            'status' => $this->getStatus(),
            'statusDateTime' => $this->getStatusDateTime(),
            'reason' => $this->getReason(),
            'reasonDescription' => $this->getReasonDescription(),
            'refundDate' => $this->getRefundDate(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setRefundId(isset($data['refundId']) ? $data['refundId'] : null);
        $this->setAmount(isset($data['amount']) ? $data['amount'] : null);
        $this->setCurrencyCode(isset($data['currencyCode']) ? $data['currencyCode'] : null);
        $this->setStatus(isset($data['status']) ? $data['status'] : null);
        $this->setStatusDateTime(isset($data['statusDateTime']) ? $data['statusDateTime'] : null);
        $this->setReason(isset($data['reason']) ? $data['reason'] : null);
        $this->setReasonDescription(isset($data['reasonDescription']) ? $data['reasonDescription'] : null);
        $this->setRefundDate(isset($data['refundDate']) ? $data['refundDate'] : null);

        return $this;
    }
}
