<?php

namespace Yorki\Payu\Response;

use Yorki\Payu\Response\Schema\Status;

class Error extends Base
{
    /**
     * @var Status
     */
    protected $status;

    /**
     * @var array
     */
    protected $data;

    public function __construct()
    {
        $this->status = new Status();
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     *
     * @return $this
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return (array) $this->data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = (array) $data;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'status' => $this->getStatus()->toArray(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        if (isset($data['status'])) {
            $this->getStatus()->fromArray($data['status']);
        }

        $this->setData($data);

        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return false;
    }
}
