<?php

namespace Yorki\Payu\Response;

use Yorki\Payu\Response\Schema\PayMethods as PayMethodsSchema;

class PayMethods extends Base
{
    /**
     * @var PayMethodsSchema
     */
    protected $payByLinks;

    public function __construct()
    {
        $this->payByLinks = new PayMethodsSchema();
    }

    /**
     * @return PayMethodsSchema
     */
    public function getPayByLinks()
    {
        return $this->payByLinks;
    }

    /**
     * @param PayMethodsSchema $payByLinks
     *
     * @return $this
     */
    public function setPayByLinks(PayMethodsSchema $payByLinks)
    {
        $this->payByLinks = $payByLinks;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'payByLinks' => $this->getPayByLinks()->toArray(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        if (isset($data['payByLinks'])) {
            $this->payByLinks->fromArray($data['payByLinks']);
        }

        return $this;
    }
}
