<?php

namespace Tests\Factories;

/**
 * Class BestHotelsDataFactory
 *
 * @package Tests\Factories
 */
class BestHotelsDataFactory
{
    /**
     * @var array $items
     */
    protected $items = [
        [
            'hotel' => 'hotel 5',
            'hotelRate' => 1,
            'hotelFare' => '50.00',
            'roomAmenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotel' => 'hotel 6',
            'hotelRate' => 2,
            'hotelFare' => '150.00',
            'roomAmenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotel' => 'hotel 7',
            'hotelRate' => 3,
            'hotelFare' => '100.00',
            'roomAmenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotel' => 'hotel 8',
            'hotelRate' => 4,
            'hotelFare' => '200.00',
            'roomAmenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
    ];

    /**
     * Get all items.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Generate fake output.
     *
     * @return \Illuminate\Support\Collection
     */
    public function generateFakeBestHotels()
    {
        $hotels = [];

        foreach ($this->items as $singleItem) {

            $item = new \stdClass();
            $item->provider = "Best Hotels";
            $item->hotelName = $singleItem['hotel'];
            $item->rate = $singleItem['hotelRate'];
            $item->fare = $singleItem['hotelFare'];
            $item->amenities = $singleItem['roomAmenities'];
            $hotels[] = $item;
        }

        return collect($hotels);
    }
}
