<?php

namespace App\DataMappers;

use App\Contracts\BestHotelsDataMapperInterface;
use stdClass;

/**
 * Class BestHotelsDataMapper
 *    Use this class for BestHotels data mapping.
 *
 * @package App\DataMappers
 */
class BestHotelsDataDataMapper extends BaseHotelsDataMapper implements BestHotelsDataMapperInterface
{
    /**
     * @var array $filtersMapping
     */
    protected $filtersMapping = [
        'from_date' => 'fromDate',
        'to_date' => 'toDate',
        'city' => 'city',
        'adults_ number' => 'numberOfAdults',
    ];

    /**
     * @var string $provider
     */
    protected $provider = 'Best Hotels';

    /**
     * Map single record from BestHotels into OutHotels standard data.
     *
     * @param $item
     * @return \stdClass
     */
    protected function mapSingleItem($item)
    {
        $newItem = new stdClass();
        $newItem->provider = $this->provider;
        $newItem->hotelName = $item->hotel;
        $newItem->rate = $item->hotelRate;
        $newItem->fare = $item->hotelFare;
        $newItem->amenities = $item->roomAmenities;

        return $newItem;
    }
}
