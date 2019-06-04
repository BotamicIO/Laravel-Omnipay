<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Omnipay;

use Artisanry\ServiceProvider\ServiceProvider as BaseProvider;
use Omnipay\Common\GatewayFactory;

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
