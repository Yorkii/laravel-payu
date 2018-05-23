<?php

namespace Yorki\Payu\Response;

abstract class Base
{
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }
}
