<?php


declare(strict_types=1);

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Omnipay;

use BrianFaust\ServiceProvider\ServiceProvider as BaseProvider;
use Omnipay\Common\GatewayFactory;

class OmnipayServiceProvider extends BaseProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
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
    public function provides(): array
    {
        return array_merge(parent::provides(), ['omnipay']);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'omnipay';
    }
}
