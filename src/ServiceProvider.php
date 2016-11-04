<?php

namespace BrianFaust\Omnipay;

use BrianFaust\ServiceProvider\ServiceProvider as BaseProvider;
use Omnipay\Common\GatewayFactory;

class ServiceProvider extends BaseProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->publishConfig();

        $this->app->singleton('omnipay', function ($app) {
            $defaults = $app['config']->get('omnipay.defaults', []);

            return new GatewayManager($app, new GatewayFactory(), $defaults);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(parent::provides(), ['omnipay']);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'omnipay';
    }
}
