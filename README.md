# laravel-payu

Laravel implementation of REST API for PayU service

```
composer require yorki/laravel-payu
```

To publish config
```
php artian vendor:publish --provider="Yorki\Payu\ServiceProvider"
```

#### Example of implementation in our controller
```php
<?php
//$client is instance of Client
$orderRequest = $client->getNewOrderRequest();
$orderRequest->setCurrencyCode(NewOrder::CURRENCY_PLN)
    ->setExtOrderId(123456)
    ->setTotalAmount(10000)
    ->setDescription('Premium')
    ->setCustomerIp($request->getClientIp());

//Lets get instance of NewOrder request and fill it up
$product = $orderRequest->getProducts()->create();
$product->setName('Konto premium')
    ->setQuantity(1)
    ->setUnitPrice(10000);

//Send our request and get response object
$response = $orderRequest->send();

//Check if we are fine
if ($response->isSuccess()) {
    //We should redirect to payment gateway
    redirect($response->getRedirectUri());
} else {
    //Something went wrong
    echo 'Error: ' . $response->getStatus()->getStatusCode();
}
```

#### Example of implementation in our notification endpoint
```php
<?php
$notification = $client->getNotification();
//Get external order Id and find in database
$notification->getOrder()->getExtOrderId();
//Check status
if ($notification->getOrder()->getStatus() === Yorki\Payu\Notifications\Schema\Order::STATUS_COMPLETED) {
    //you can extract buyer info from order
    $buyer = $notification->getOrder()->getBuyer();
    $buyerEmail = $buyer->getEmail();
    $buyerWholeData = $buyer->toArray();
}
```

#### Example of notification route
```php
<?php
//api.php
Route::group([
    'prefix' => 'payu',
], function () {
    $this->post('notification', 'PayuController@notification');
});
```