<?php

namespace App\Services;

use App\Contracts\OurHotelsServiceInterface;
use App\Contracts\HotelsProvidersFactoryInterface;
use Illuminate\Support\Collection;

/**
 * Class OurHotelsService
 *   Use this service to handle the search functionality business logic.
 *
 * @package App\Services
 */
class OurHotelsService implements OurHotelsServiceInterface
{
    /**
     * @var \App\Factories\HotelsProvidersFactory
     */
    protected $hotelsProvidersFactory;

    /**
     * OurHotelsService constructor.
     *
     * @param \App\Contracts\HotelsProvidersFactoryInterface $hotelsProvidersFactory
     */
    public function __construct(HotelsProvidersFactoryInterface $hotelsProvidersFactory)
    {
        $this->hotelsProvidersFactory = $hotelsProvidersFactory;
    }

    /**
     * Aggregate available hotels from all hotels Providers.
     *
     * @param array $filters
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public function getAvailableHotels($filters = [])
    {
        $items = new Collection();
        // Instantiate available providers.
        $hotelsProviders = $this->hotelsProvidersFactory->getProviders();
        // Call each provider to get available hotels according the available filters.
        /** @var \App\Contracts\HotelsProviderInterface $hotelProvider */
        foreach ($hotelsProviders as $hotelProvider) {
            /** @var Collection $providerHotels */
            $providerHotels = $hotelProvider->getHotels($filters);
            // Merge returned results.
            $items = $items->merge($providerHotels);
        }
        // Sort and return results.
        $items = $items->sortByDesc(function ($item) {
            return $item->rate;
        });

        return $items;
    }
}
