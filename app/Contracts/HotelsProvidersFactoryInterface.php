<?php

namespace App\Contracts;

/**
 * Interface HotelsProvidersFactoryInterface
 *
 * @package App\Factories
 */
interface HotelsProvidersFactoryInterface
{
    /**
     * Instantiate and return all the available hotels providers into collection.
     *
     * @throws \Exception
     */
    public function getProviders();
}
