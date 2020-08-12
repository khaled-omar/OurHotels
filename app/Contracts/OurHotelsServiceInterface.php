<?php

namespace App\Contracts;

/**
 * Class OurHotelsService
 *   Implement this interface to handle the search functionality business logic.
 *
 * @package App\Services
 */
interface OurHotelsServiceInterface
{
    /**
     * Aggregate available hotels from all hotels Providers.
     *
     * @param array $filters
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public function getAvailableHotels($filters = []);
}
