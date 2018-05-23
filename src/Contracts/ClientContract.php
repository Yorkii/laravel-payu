<?php

namespace Yorki\Payu\Contracts;

use Yorki\Payu\Notifications\Order;
use Yorki\Payu\Request\Cancel;
use Yorki\Payu\Request\Complete;
use Yorki\Payu\Request\NewOrder;
use Yorki\Payu\Request\PayMethods;
use Yorki\Payu\Request\Refund;

interface ClientContract
{
    /**
     * @return NewOrder
     */
    public function getNewOrderRequest();

    /**
     * @return Complete
     */
    public function getCompleteRequest();

    /**
     * @return Cancel
     */
    public function getCancelRequest();

    /**
     * @return PayMethods
     */
    public function getPayMethodsRequest();

    /**
     * @return Refund
     */
    public function getRefundRequest();

    /**
     * @return string
     */
    public function getNotificationUrl();

    /**
     * @return Order
     */
    public function getNotification();
}
