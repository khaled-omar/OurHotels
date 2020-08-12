<?php

namespace App\DataMappers;

use Illuminate\Support\Collection;

/**
 * Class BaseHotelsDataMapper
 *
 * @package App\DataMappers
 */
abstract class BaseHotelsDataMapper
{
    /**
     * Mapping of filters from ourHotels provider into new provider.
     *
     * @var array $filtersMapping
     */
    protected $filtersMapping;

    /**
     * Map ourHotels request filters into new Hotels provider.
     *
     * @param array $filters
     * @return array
     */
    public function mapFilters(array $filters = [])
    {
        $mappedFilters = [];

        if (blank($filters)) {
            return [];
        }

        foreach ($this->filtersMapping as $oldKey => $newKey) {
            if (array_key_exists($oldKey, $filters) && filled($filters[$oldKey])) {
                $mappedFilters[$newKey] = $filters[$oldKey];
            }
        }

        return $mappedFilters;
    }

    /**
     * Map results into OutHotels standard data.
     *
     * @param array $items
     * @return \Illuminate\Support\Collection
     */
    public function mapResponse($items = [])
    {
        $hotels = new Collection();
        foreach ($items as $item) {
            $hotels->add($this->mapSingleItem($item));
        }

        return $hotels;
    }

    /**
     * Map single record into OutHotels standard data.
     *
     * @param $item
     * @return \stdClass
     */
    abstract protected function mapSingleItem($item);
}
