<?php

namespace App\Contracts;

/**
 * Class TopHotelsDataMapper
 *    Use this class to map data from ourHotels.
 *
 * @package App\DataMappers
 */
interface HotelsDataMapperInterface
{
    /**
     * Map ourHotels request filters into TopHotels.
     *
     * @param array $filters
     * @return array
     */
    public function mapFilters(array $filters = []);

    /**
     * Map results into OutHotels standard data.
     *
     * @param array $items
     * @return \Illuminate\Support\Collection
     */
    public function mapResponse($items = []);
}
