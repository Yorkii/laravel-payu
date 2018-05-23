<?php

return [
    'url' => env('PAYU_API_URL', 'https://secure.snd.payu.com/api/v2_1'),
    'url_authorization' => env('PAYU_AUTHORIZATION_URL', 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize'),
    'timeout' => env('PAYU_API_TIMEOUT', 10),
    'verify' => env('PAYU_API_VERIFY', true),
    'client_id' => env('PAYU_API_CLIENT_ID'),
    'secret' => env('PAYU_API_SECRET'),
    'pos_id' => env('PAYU_POS_ID'),
    'notification_url' => env('PAYU_NOTIFICATION_URL', env('APP_URL') . '/api/payu/notification'),
];
