<?php

namespace Tests\Unit;

use App\DataMappers\TopHotelsDataDataMapper;
use App\Services\TopHotelsProviderService;
use Illuminate\Support\Facades\Http;
use Tests\Factories\TopHotelsDataFactory;
use Tests\TestCase;

/**
 * Class TopHotelsProviderServiceTest
 *
 * @package Tests\Unit
 */
class TopHotelsProviderServiceTest extends TestCase
{
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
        $this->topHotelsDataFactory = resolve(TopHotelsDataFactory::class);
    }

    /**
     * Test get hotels.
     *
     * @return void
     */
    public function testGetHotels()
    {
        // Mock DataMapper mapFilters and mapResponse.
        $dataMapperMock = $this->getMockBuilder(TopHotelsDataDataMapper::class)->disableOriginalConstructor()->getMock();
        $dataMapperMock->expects($this->any())->method('mapFilters')->willReturn([]);
        // Mock DataMapper mapResponse.
        $expected = $this->topHotelsDataFactory->generateFakeTopHotels();
        $dataMapperMock->expects($this->any())->method('mapResponse')->willReturn($expected);

        // Stub a JSON response for api.bestHotels.com/ endpoint.
        Http::fake([
            'api.topHotels.com/*' => Http::response(['data' => $this->topHotelsDataFactory->getItems()], 200),
        ]);
        // Instantiate and assert.
        $bestHotelsProviderService = new TopHotelsProviderService($dataMapperMock);
        $actual = $bestHotelsProviderService->getHotels([]);
        $this->assertEquals($expected, $actual);
    }
}
