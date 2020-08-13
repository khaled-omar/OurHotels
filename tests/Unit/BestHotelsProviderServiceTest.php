<?php

namespace Tests\Unit;

use App\DataMappers\BestHotelsDataDataMapper;
use App\Services\BestHotelsProviderService;
use Illuminate\Support\Facades\Http;
use Tests\Factories\BestHotelsDataFactory;
use Tests\TestCase;

/**
 * Class BestHotelsProviderServiceTest
 *
 * @package Tests\Unit
 */
class BestHotelsProviderServiceTest extends TestCase
{
    /**
     * @var \Tests\Factories\BestHotelsDataFactory
     */
    protected $bestHotelsDataFactory;

    /**
     * OurHotelsServiceTest constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->bestHotelsDataFactory = resolve(BestHotelsDataFactory::class);
    }

    /**
     * Test get hotels.
     *
     * @return void
     */
    public function testGetHotels()
    {
        // Mock DataMapper mapFilters and mapResponse.
        $dataMapperMock = $this->getMockBuilder(BestHotelsDataDataMapper::class)->disableOriginalConstructor()->getMock();
        $dataMapperMock->expects($this->any())->method('mapFilters')->willReturn([]);
        // Mock DataMapper mapResponse.
        $expected = $this->bestHotelsDataFactory->generateFakeBestHotels();
        $dataMapperMock->expects($this->any())->method('mapResponse')->willReturn($expected);

        // Stub a JSON response for api.bestHotels.com/ endpoint.
        Http::fake([
            'api.bestHotels.com/*' => Http::response(['data' => $this->bestHotelsDataFactory->getItems()], 200),
        ]);
        // Instantiate and assert.
        $bestHotelsProviderService = new BestHotelsProviderService($dataMapperMock);
        $actual = $bestHotelsProviderService->getHotels([]);
        $this->assertEquals($expected, $actual);
    }
}
