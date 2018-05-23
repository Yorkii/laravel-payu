<?php

namespace Yorki\Payu\Response\Schema;

class Status
{
    const SUCCESS = 'SUCCESS';

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return (string) $this->statusCode;
    }

    /**
     * @param string $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = (string) $statusCode;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'statusCode' => $this->getStatusCode(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setStatusCode(isset($data['statusCode']) ? $data['statusCode'] : null);

        return $this;
    }
}
