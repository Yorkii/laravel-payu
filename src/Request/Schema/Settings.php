<?php

namespace Yorki\Payu\Request\Schema;

class Settings
{
    /**
     * @var bool
     */
    protected $invoiceDisabled;

    /**
     * @var bool
     */
    protected $modified;

    /**
     * @return bool
     */
    public function isInvoiceDisabled()
    {
        return (bool) $this->invoiceDisabled;
    }

    /**
     * @param bool $invoiceDisabled
     *
     * @return $this
     */
    public function setInvoiceDisabled($invoiceDisabled)
    {
        $this->invoiceDisabled = (bool) $invoiceDisabled;
        $this->setModified(true);

        return $this;
    }

    /**
     * @return bool
     */
    public function isModified()
    {
        return (bool) $this->modified;
    }

    /**
     * @param bool $modified
     *
     * @return $this
     */
    public function setModified($modified)
    {
        $this->modified = (bool) $modified;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'invoiceDisabled' => $this->isInvoiceDisabled(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setInvoiceDisabled(isset($data['invoiceDisabled']) ? (bool) (int) $data['invoiceDisabled'] : false);

        return $this;
    }
}
