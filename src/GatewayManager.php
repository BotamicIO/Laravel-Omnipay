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

class GatewayManager
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The registered gateways.
     */
    protected $gateways;

    /**
     * The default settings, applied to every gateway.
     */
    protected $defaults;

    /**
     * Create a new Gateway manager instance.
     *
     * @param \Illuminate\Foundation\Application $app
     * @param \Omnipay\Common\GatewayFactory     $factory
     * @param  array
     */
    public function __construct($app, GatewayFactory $factory, $defaults = [])
    {
        $this->app = $app;
        $this->factory = $factory;
        $this->defaults = $defaults;
    }

    /**
     * Get a gateway.
     *
     * @param  string  The gateway to retrieve (null=default)
     *
     * @return \Omnipay\Common\GatewayInterface
     */
    public function gateway($class = null)
    {
        $class = $class ?: $this->getDefaultGateway();

        if (!isset($this->gateways[$class])) {
            $gateway = $this->factory->create($class, null, $this->app['request']);

            $gateway->initialize($this->getConfig($class));

            $this->gateways[$class] = $gateway;
        }

        return $this->gateways[$class];
    }

    /**
     * Get the configuration, based on the config and the defaults.
     */
    protected function getConfig($name): array
    {
        return array_merge(
            $this->defaults,
            $this->app['config']->get('laravel-omnipay.gateways.'.$name, [])
        );
    }

    /**
     * Get the default gateway name.
     *
     * @return string
     */
    public function getDefaultGateway(): string
    {
        return $this->app['config']['omnipay.gateway'];
    }

    /**
     * Set the default gateway name.
     *
     * @param string $name
     */
    public function setDefaultGateway($name)
    {
        $this->app['config']['omnipay.gateway'] = $name;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->gateway(), $method], $parameters);
    }
}
