<?php

namespace BrianFaust\Omnipay\Facades;

use Illuminate\Support\Facades\Facade;

class Omnipay extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'omnipay';
    }
}
