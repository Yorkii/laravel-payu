<?php namespace Yorki\Payu;

use Yorki\Payu\Contracts\ClientContract;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/payu.php' => config_path('payu.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(
            ClientContract::class,
            new Client(config('payu'))
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            Client::class,
        ];
    }
}