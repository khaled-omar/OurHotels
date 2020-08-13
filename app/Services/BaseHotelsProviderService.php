<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Class BaseHotelsProviderService
 *
 * @package App\Services
 */
abstract class BaseHotelsProviderService
{
    /**
     * @var \App\DataMappers\BestHotelsDataDataMapper|\App\DataMappers\TopHotelsDataDataMapper
     */
    protected $dataMapper;

    /**
     * @var string $endpoint
     */
    protected $endpoint;

    /**
     * Get available hotels.
     *
     * @param array $filters
     * @return array|string
     */
    public function getHotels($filters = [])
    {
        // Map filters into BestHotels standard filters.
        $filters = $this->dataMapper->mapFilters($filters);

        try {
            // Send request and return Mapped results into OutHotels standard data.
            $response = Http::post($this->endpoint, $filters);
            $responseBody = json_decode($response->body());

            return $this->dataMapper->mapResponse($responseBody->data);
        } catch (\Exception $exception) {
            Log::error("Error occurred while retrieving hotels  ".$exception->getMessage());

            return collect();
        }
    }
}
