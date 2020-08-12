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
            // Fake the response to dummy URL.
            // Send request and return Mapped results into OutHotels standard data.
            $this->fakeResponse();
            $response = Http::post($this->endpoint, $filters);
            $responseBody = json_decode($response->body());

            return $this->dataMapper->mapResponse($responseBody->data);
        } catch (\Exception $exception) {
            Log::error("Error occurred while retrieving hotels  ".$exception->getMessage());

            return collect();
        }
    }

    /**
     * Fake the response with dummy URL.
     */
    protected function fakeResponse(): void
    {
        // Stub a JSON response for endpoint.
        Http::fake([
            $this->endpoint => Http::response(['data' => $this->generateFakeHotels()], 200),
        ]);
    }

    /**
     * Return fake hotels.
     *
     * @return array $hotels
     */
    abstract protected function generateFakeHotels();
}
