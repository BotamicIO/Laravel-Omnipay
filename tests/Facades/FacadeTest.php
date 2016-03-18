<?php

/*
 * This file is part of Laravel Omnipay.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Tests\Omnipay\Facades;

use DraperStudio\Omnipay\Facades\Omnipay;
use DraperStudio\Omnipay\GatewayManager;
use DraperStudio\Tests\Omnipay\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This is the facade test class.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class FacadeTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'omnipay';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Omnipay::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return GatewayManager::class;
    }
}
