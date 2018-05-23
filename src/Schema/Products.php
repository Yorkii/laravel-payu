<?php

namespace Yorki\Payu\Schema;

class Products
{
    /**
     * @var Product[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return Product[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Product[] $items
     *
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function addProduct(Product $product)
    {
        $this->items[] = $product;

        return $this;
    }

    /**
     * @return Product
     */
    public function create()
    {
        $product = new Product();
        $this->items[] = $product;

        return $product;
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
            $this->items[] = (new Product())->fromArray($itemData);
        }

        return $this;
    }
}
