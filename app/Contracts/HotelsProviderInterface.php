<?php

namespace App\Contracts;

/**
 * Class BestHotelsProviderService
 *    Use this class for BestHotels provider integration.
 *
 * @package App\Services
 */
interface HotelsProviderInterface
{
    /**
     * Get available hotels.
     *
     * @param array $filters
     * @return array|string
     */
    public function getHotels($filters = []);
}
