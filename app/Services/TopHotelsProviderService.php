<?php

namespace App\Services;

use App\Contracts\HotelsProviderInterface;
use App\Contracts\TopHotelsDataMapperInterface;

/**
 * Class TopHotelsProviderService
 *    Use this class for TopHotels provider integration.
 *
 * @package App\Services
 */
class TopHotelsProviderService extends BaseHotelsProviderService implements HotelsProviderInterface
{
    /**
     * @var \App\DataMappers\TopHotelsDataDataMapper
     */
    protected $dataMapper;

    /**
     * @var string $endpoint
     */
    protected $endpoint = 'api.topHotels.com/';

    /**
     * TopHotelsProviderService constructor.
     *
     * @param \App\Contracts\TopHotelsDataMapperInterface $dataMapper
     */
    public function __construct(TopHotelsDataMapperInterface $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Generate fake top hotels data.
     *
     * @return array
     */
    protected function generateFakeHotels()
    {
        return [
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
    }
}
