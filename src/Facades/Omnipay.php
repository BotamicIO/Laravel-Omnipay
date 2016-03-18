<?php

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Omnipay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Omnipay.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
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
