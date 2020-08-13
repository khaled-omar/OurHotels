<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\Factories\BestHotelsDataFactory;
use Tests\Factories\TopHotelsDataFactory;
use Tests\TestCase;

/**
 * Class AdvancedSearchControllerTest
 *
 * @package Tests\Feature
 */
class AdvancedSearchControllerTest extends TestCase
{
    /**
     * @var \Tests\Factories\BestHotelsDataFactory
     */
    protected $bestHotelsDataFactory;

    /**
     * @var \Tests\Factories\TopHotelsDataFactory
     */
    protected $topHotelsDataFactory;

    /**
     * OurHotelsServiceTest constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->bestHotelsDataFactory = resolve(BestHotelsDataFactory::class);
        $this->topHotelsDataFactory = resolve(TopHotelsDataFactory::class);
    }

    /**
     * Test search functionality with filters.
     *
     * @return void
     */
    public function testSearchWithFilters()
    {
        $filters = [
            "from_date" => "2011-12-05",
            "to_date" => "2011-12-05",
            "city" => "CAI",
            "adults_ number" => 5
        ];
        // Stub a JSON response for api.bestHotels.com/ endpoint.
        Http::fake([
            'api.topHotels.com/*' => Http::response(['data' => $this->topHotelsDataFactory->getItems()], 200),
            'api.bestHotels.com/*' => Http::response(['data' => $this->bestHotelsDataFactory->getItems()], 200)
        ]);
        $response = $this->json('get', 'api/search', $filters);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'provider',
                    'hotelName',
                    'rate',
                    'discount',
                    'fare',
                    'amenities',
                ]
            ],
        ]);
    }

    /**
     * Test search functionality without filters.
     *
     * @return void
     */
    public function testSearchWithoutFilters()
    {
        // Stub a JSON response for api.bestHotels.com/ endpoint.
        Http::fake([
            'api.topHotels.com/*' => Http::response(['data' => $this->topHotelsDataFactory->getItems()], 200),
            'api.bestHotels.com/*' => Http::response(['data' => $this->bestHotelsDataFactory->getItems()], 200)
        ]);
        $response = $this->json('get', 'api/search');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'provider',
                    'hotelName',
                    'rate',
                    'discount',
                    'fare',
                    'amenities',
                ]
            ],
        ]);
    }
}
