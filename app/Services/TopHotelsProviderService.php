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
}
