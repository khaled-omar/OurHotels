<?php

namespace App\DataMappers;

use App\Contracts\TopHotelsDataMapperInterface;

/**
 * Class TopHotelsDataMapper
 *    Use this class to map data from ourHotels into topHotels.
 *
 * @package App\DataMappers
 */
class TopHotelsDataDataMapper extends BaseHotelsDataMapper implements TopHotelsDataMapperInterface
{
    /**
     * Mapping of filters from ourHotels provider into new provider.
     *
     * @var string $provider
     */
    protected $provider = 'Top Hotels';

    /**
     * Mapping of filters from ourHotels provider into new provider.
     *
     * @var array $filtersMapping
     */
    protected $filtersMapping = [
        'from_date' => 'from',
        'to_date' => 'To',
        'city' => 'city',
        'adults_ number' => 'adultsCount',
    ];

    /**
     * Array of date fields to be converted.
     *
     * @var array $dateFields
     */
    protected $dateFields = ['from_date', 'to_date'];

    /**
     * Map ourHotels request filters into new Hotels provider.
     *
     * @param array $filters
     * @return array
     */
    public function mapFilters(array $filters = [])
    {
        $filters = $this->convertDateFieldsToISOFormat($filters);

        return parent::mapFilters($filters);
    }

    /**
     * Map single record into OutHotels standard data.
     *
     * @param $item
     * @return \stdClass
     */
    protected function mapSingleItem($item)
    {
        $newItem = new \stdClass();
        $newItem->provider = $this->provider;
        $newItem->hotelName = $item->hotelName;
        $newItem->rate = substr_count($item->rate, '*');
        $newItem->discount = $item->discount;
        $newItem->fare = $item->price;
        $newItem->amenities = $item->amenities;

        return $newItem;
    }

    /**
     * Convert ISO Local date fields into ISO Instant format.
     *
     * @param array $filters
     * @return array
     */
    protected function convertDateFieldsToISOFormat(array $filters): array
    {
        foreach ($this->dateFields as $key) {
            if (array_key_exists($key, $filters) && filled($filters[$key])) {
                $filters[$key] = date("Y-m-d\TH:i:s\Z", strtotime($filters[$key]));
            }
        }

        return $filters;
    }
}
