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
}
