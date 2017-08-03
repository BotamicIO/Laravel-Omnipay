<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Omnipay;

use Omnipay\Common\GatewayFactory;
use BrianFaust\ServiceProvider\ServiceProvider as BaseProvider;

class OmnipayServiceProvider extends BaseProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-omnipay.php' => config_path('laravel-omnipay.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('omnipay', function ($app) {
            $defaults = $app['config']->get('laravel-omnipay.defaults', []);

            return new GatewayManager($app, new GatewayFactory(), $defaults);
        });
    }
}
