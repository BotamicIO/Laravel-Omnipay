<?php

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Omnipay;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;
use Omnipay\Common\GatewayFactory;

/**
 * Class ServiceProvider.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
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
