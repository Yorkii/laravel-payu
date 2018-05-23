<?php

namespace Yorki\Payu\Schema;

class Product
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $unitPrice;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice()
    {
        return (int) $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = (int) $unitPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return (int) $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = (int) $quantity;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'unitPrice' => (string) $this->getUnitPrice(),
            'quantity' => (string) $this->getQuantity(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setName(isset($data['name']) ? $data['name'] : null);
        $this->setUnitPrice(isset($data['unitPrice']) ? $data['unitPrice'] : null);
        $this->setQuantity(isset($data['quantity']) ? $data['quantity'] : null);

        return $this;
    }
}
