<?php

namespace Yorki\Payu\Response\Schema;

class PayMethods
{
    /**
     * @var PayMethod[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return PayMethod[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param PayMethod[] $items
     *
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param PayMethod $payMethod
     *
     * @return $this
     */
    public function addProduct(PayMethod $payMethod)
    {
        $this->items[] = $payMethod;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        foreach ($this->items as $item) {
            $result[] = $item->toArray();
        }

        return $result;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->items = [];

        foreach ($data as $itemData) {
            $this->items[] = (new PayMethod())->fromArray($itemData);
        }

        return $this;
    }
}
