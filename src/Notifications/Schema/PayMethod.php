<?php

namespace Yorki\Payu\Notifications\Schema;

class PayMethod
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType()
    {
        return (string) $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = (string) $type;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->getType(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setType(isset($data['type']) ? $data['type'] : null);

        return $this;
    }
}
