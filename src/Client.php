<?php

namespace Yorki\Payu;

use Yorki\Payu\Contracts\ClientContract;
use Yorki\Payu\Notifications\Order;
use Yorki\Payu\Request\Base;
use Yorki\Payu\Request\Cancel;
use Yorki\Payu\Request\Complete;
use Yorki\Payu\Request\NewOrder;
use Yorki\Payu\Request\PayMethods;
use Yorki\Payu\Request\Refund;

class Client implements ClientContract
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $urlAuthorization;

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var int
     */
    protected $posId;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $notificationUrl;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'http_errors' => false,
            'timeout' => $options['timeout'],
            'verify' => $options['verify'],
        ]);
        $this->url = $options['url'];
        $this->urlAuthorization = $options['url_authorization'];
        $this->posId = $options['pos_id'];
        $this->clientId = $options['client_id'];
        $this->secret = $options['secret'];
        $this->notificationUrl = $options['notification_url'];
    }

    /**
     * @param Base $request
     *
     * @throws \Exception
     *
     * @return string
     */
    public function send(Base $request)
    {
        $this->authorize();

        switch (strtoupper($request->getMethod())) {
            case 'POST':
                return $this->post($request->getEndpoint(), $request->getData());
        }

        throw new \Exception('Request method not implemented');
    }

    /**
     * @return NewOrder
     */
    public function getNewOrderRequest()
    {
        return (new Request())->make(Request::REQUEST_NEW_ORDER, $this);
    }

    /**
     * @return Complete
     */
    public function getCompleteRequest()
    {
        return (new Request())->make(Request::REQUEST_COMPLETE, $this);
    }

    /**
     * @return Cancel
     */
    public function getCancelRequest()
    {
        return (new Request())->make(Request::REQUEST_CANCEL, $this);
    }

    /**
     * @return PayMethods
     */
    public function getPayMethodsRequest()
    {
        return (new Request())->make(Request::REQUEST_PAY_METHODS, $this);
    }

    /**
     * @return Refund
     */
    public function getRefundRequest()
    {
        return (new Request())->make(Request::REQUEST_REFUND, $this);
    }

    /**
     * @return Order
     */
    public function getNotification()
    {
        $request = \Illuminate\Http\Request::capture();

        return (new Order())->fromArray($request->all());
    }

    /**
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }

    /**
     * @return int
     */
    public function getPosId()
    {
        return $this->posId;
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param string $url
     *
     * @return string
     */
    protected function removeTrailingSlash($url)
    {
        if (strrpos($url, '/') === strlen($url) - 1) {
            $url = substr($url, 0, -1);
        }

        return $url;
    }

    /**
     * @param string $endpoint
     *
     * @return string
     */
    protected function getWrappedApiUrl($endpoint)
    {
        $apiUrl = $this->removeTrailingSlash($this->url);

        return $apiUrl . $this->removeTrailingSlash($endpoint);
    }

    protected function authorize()
    {
        if ($this->accessToken) {
            return;
        }

        $res = $this->httpClient->post($this->urlAuthorization, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->secret,
            ],
        ]);

        $body = $res->getBody();

        if (null === $body) {
            throw new \Exception('Could not authorize PayU api');
        }

        $content = $body->getContents();
        $json = json_decode($content);

        if (!$content || !$json) {
            throw new \Exception('Could not authorize PayU api');
        }

        if (isset($json->error)) {
            throw new \Exception('Could not authorize PayU api. ' . $json->error_description);
        }

        $this->accessToken = $json->access_token;
    }

    /**
     * @param string $endpoint
     * @param array  $data
     *
     * @return array|null
     */
    protected function post($endpoint, $data = [])
    {
        $res = $this->httpClient->post($this->getWrappedApiUrl($endpoint), [
            'headers' => $this->getHeaders(),
            'json' => $data,
            'allow_redirects' => false,
        ]);

        try {
            $body = $res->getBody();

            if (null === $body) {
                return null;
            }

            return json_decode($body->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param string$endpoint
     *
     * @return array|null
     */
    protected function get($endpoint)
    {
        $res = $this->httpClient->get($this->getWrappedApiUrl($endpoint), [
            'headers' => $this->getHeaders(),
            'allow_redirects' => false,
        ]);

        try {
            $body = $res->getBody();

            if (null === $body) {
                return null;
            }

            return json_decode($body->getContents(), true);
        } catch (\Exception $e) {
            return null;
        }
    }
}
