<?php

namespace Yorki\Payu\Notifications;

use Yorki\Payu\Notifications\Schema\Order as OrderSchema;
use Yorki\Payu\Notifications\Schema\Properties;

class Order extends Base
{
    /**
     * @var OrderSchema
     */
    protected $order;

    /**
     * @var string
     */
    protected $localReceiptDateTime;

    /**
     * @var Properties
     */
    protected $properties;

    public function __construct()
    {
        $this->order = new OrderSchema();
        $this->properties = new Properties();
    }

    /**
     * @return OrderSchema
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param OrderSchema $order
     *
     * @return $this
     */
    public function setOrder(OrderSchema $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalReceiptDateTime()
    {
        return (string) $this->localReceiptDateTime;
    }

    /**
     * @param string $localReceiptDateTime
     *
     * @return $this
     */
    public function setLocalReceiptDateTime($localReceiptDateTime)
    {
        $this->localReceiptDateTime = (string) $localReceiptDateTime;

        return $this;
    }

    /**
     * @return Properties
     */
    public function getProperties()
    {
        return  $this->properties;
    }

    /**
     * @param Properties $properties
     *
     * @return $this
     */
    public function setProperties(Properties $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'order' => $this->getOrder()->toArray(),
            'localReceiptDateTime' => $this->getLocalReceiptDateTime(),
            'properties' => $this->getProperties()->toArray(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setLocalReceiptDateTime(isset($data['localReceiptDateTime']) ? $data['localReceiptDateTime'] : null);

        if (isset($data['order'])) {
            $this->getOrder()->fromArray($data['order']);
        }

        if (isset($data['properties'])) {
            $this->getProperties()->fromArray($data['properties']);
        }

        return $this;
    }
}
