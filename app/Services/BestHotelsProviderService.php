<?php

namespace App\Services;

use App\Contracts\BestHotelsDataMapperInterface;
use App\Contracts\HotelsProviderInterface;

/**
 * Class BestHotelsProviderService
 *    Use this class for BestHotels provider integration.
 *
 * @package App\Services
 */
class BestHotelsProviderService extends BaseHotelsProviderService implements HotelsProviderInterface
{
    /**
     * @var \App\DataMappers\BestHotelsDataDataMapper
     */
    protected $dataMapper;

    /**
     * @var string $endpoint
     */
    protected $endpoint = 'api.bestHotels.com/';

    /**
     * BestHotelsProviderService constructor.
     *
     * @param \App\Contracts\BestHotelsDataMapperInterface $dataMapper
     */
    public function __construct(BestHotelsDataMapperInterface $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Generate fake hotels data.
     *
     * @return array
     */
    protected function generateFakeHotels()
    {
        return [
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
    }
}
