<?php

namespace Tests\Factories;

/**
 * Class TopHotelsDataFactory
 *
 * @package Tests\Factories
 */
class TopHotelsDataFactory
{
    /**
     * @var array $items
     */
    protected $items = [
        [
            'hotelName' => 'hotel 1',
            'rate' => '***',
            'price' => '50.00',
            'discount' => '20%',
            'amenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotelName' => 'hotel 2',
            'rate' => '*****',
            'price' => '150.00',
            'discount' => '20%',
            'amenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotelName' => 'hotel 3',
            'rate' => '**',
            'price' => '100.00',
            'discount' => '20%',
            'amenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
        ],
        [
            'hotelName' => 'hotel 4',
            'rate' => '****',
            'price' => '200.00',
            'discount' => '20%',
            'amenities' => ['amenity 1', 'amenity 2', 'amenity 3', 'amenity 4'],
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
     * Generate fake data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function generateFakeTopHotels()
    {
        $hotels = [];
        foreach ($this->items as $singleItem) {

            $item = new \stdClass();
            $item->provider = "Top Hotels";
            $item->hotelName = $singleItem['hotelName'];
            $item->rate = substr_count($singleItem['rate'], '*');
            $item->discount = $singleItem['discount'];
            $item->fare = $singleItem['price'];
            $item->amenities = $singleItem['amenities'];
            $hotels[] = $item;
        }

        return collect($hotels);
    }
}
