<?php

namespace Yorki\Payu\Notifications\Schema;

class Properties
{
    /**
     * @var Property[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return Property[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Property[] $items
     *
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param Property $property
     *
     * @return $this
     */
    public function addProduct(Property $property)
    {
        $this->items[] = $property;

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
            $this->items[] = (new Property())->fromArray($itemData);
        }

        return $this;
    }
}
