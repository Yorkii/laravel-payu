<?php

namespace Yorki\Payu;

use Yorki\Payu\Request\Base;
use Yorki\Payu\Request\Cancel;
use Yorki\Payu\Request\Complete;
use Yorki\Payu\Request\NewOrder;
use Yorki\Payu\Request\PayMethods;
use Yorki\Payu\Request\Refund;

class Request
{
    const REQUEST_NEW_ORDER = 'new_order';
    const REQUEST_COMPLETE = 'complete';
    const REQUEST_CANCEL = 'cancel';
    const REQUEST_PAY_METHODS = 'pay_methods';
    const REQUEST_REFUND = 'refund';

    /**
     * @param string $requestType
     *
     * @throws \Exception
     *
     * @return Base
     */
    public function make($requestType, Client $client)
    {
        switch ($requestType) {
            case self::REQUEST_NEW_ORDER:
                return new NewOrder($client);
            case self::REQUEST_COMPLETE:
                return new Complete($client);
            case self::REQUEST_CANCEL:
                return new Cancel($client);
            case self::REQUEST_PAY_METHODS:
                return new PayMethods($client);
            case self::REQUEST_REFUND:
                return new Refund($client);
            default:
                throw new \Exception('Invalid request type');
        }
    }
}
