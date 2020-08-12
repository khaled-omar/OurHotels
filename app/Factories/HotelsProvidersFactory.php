<?php

namespace App\Factories;

use App\Contracts\HotelsProvidersFactoryInterface;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class HotelsProvidersFactory
 *
 * @package App\Factories
 */
class HotelsProvidersFactory implements HotelsProvidersFactoryInterface
{
    /**
     * Array of available hotels providers.
     *
     * @var array $hotelsProviders
     */
    protected $hotelsProviders;

    /**
     * HotelsProvidersFactory constructor.
     */
    public function __construct()
    {
        $this->hotelsProviders = config('ourhotels.providers');
    }

    /**
     * Instantiate and return all the available hotels providers into collection.
     *
     * @throws \Exception
     */
    public function getProviders()
    {
        $providersCollection = new Collection();
        foreach ($this->hotelsProviders as $providerClass) {
            if (! class_exists($providerClass)) {
                throw  new Exception("Invalid or does not exist hotel provider class $providerClass");
            }

            $providersCollection->add(resolve($providerClass));
        }

        return $providersCollection;
    }
}
