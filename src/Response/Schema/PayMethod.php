<?php

namespace Yorki\Payu\Response\Schema;

class PayMethod
{
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
            $this->items[] = (new Product())->fromArray($itemData);
        }

        return $this;
    }
}