<?php

namespace Tests\Unit;

use App\Factories\HotelsProvidersFactory;
use App\Services\BestHotelsProviderService;
use App\Services\OurHotelsService;
use App\Services\TopHotelsProviderService;
use PHPUnit\Framework\TestCase;
use Tests\Factories\BestHotelsDataFactory;
use Tests\Factories\TopHotelsDataFactory;

/**
 * Class OurHotelsServiceTest
 *
 * @package Tests\Unit
 */
class OurHotelsServiceTest extends TestCase
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
     * A basic unit test example.
     *
     * @return void
     * @throws \Exception
     */
    public function testGetAvailableHotels()
    {
        // Mock Best Hotels
        $bestHotelsProviderServiceMock = $this->getMockBuilder(BestHotelsProviderService::class)->disableOriginalConstructor()->getMock();
        $bestHotelsFakeData = $this->bestHotelsDataFactory->generateFakeBestHotels();
        $bestHotelsProviderServiceMock->expects($this->any())->method('getHotels')->willReturn($bestHotelsFakeData);
        // Mock Top Hotels
        $topHotelsProviderServiceMock = $this->getMockBuilder(TopHotelsProviderService::class)->disableOriginalConstructor()->getMock();
        $topHotelsFakeData = $this->topHotelsDataFactory->generateFakeTopHotels();
        $topHotelsProviderServiceMock->expects($this->any())->method('getHotels')->willReturn($topHotelsFakeData);
        // Mock provider factory.
        $hotelsProvidersFactoryMock = $this->getMockBuilder(HotelsProvidersFactory::class)->disableOriginalConstructor()->getMock();
        $hotelsProvidersFactoryMock->expects($this->any())->method('getProviders')->willReturn([
            $bestHotelsProviderServiceMock,
            $topHotelsProviderServiceMock
        ]);
        // Instantiate hotels service and assert expected results.
        $hotelsService = new OurHotelsService($hotelsProvidersFactoryMock);
        $actual = $hotelsService->getAvailableHotels([]);
        $expected = $bestHotelsFakeData->merge($topHotelsFakeData);

        $this->assertEquals($expected, $actual);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     * @throws \Exception
     */
    public function testEmptyGetAvailableHotels()
    {
        // Mock Best Hotels
        $bestHotelsProviderServiceMock = $this->getMockBuilder(BestHotelsProviderService::class)->disableOriginalConstructor()->getMock();
        $bestHotelsProviderServiceMock->expects($this->any())->method('getHotels')->willReturn(collect());
        // Mock Top Hotels
        $topHotelsProviderServiceMock = $this->getMockBuilder(TopHotelsProviderService::class)->disableOriginalConstructor()->getMock();
        $topHotelsProviderServiceMock->expects($this->any())->method('getHotels')->willReturn(collect());
        // Mock  provider factory.
        $hotelsProvidersFactoryMock = $this->getMockBuilder(HotelsProvidersFactory::class)->disableOriginalConstructor()->getMock();
        $hotelsProvidersFactoryMock->expects($this->any())->method('getProviders')->willReturn([
            $bestHotelsProviderServiceMock,
            $topHotelsProviderServiceMock
        ]);
        // Instantiate hotels service and assert if empty items.
        $hotelsService = new OurHotelsService($hotelsProvidersFactoryMock);
        $actual = $hotelsService->getAvailableHotels([]);
        $this->assertEquals(collect(), $actual);
    }
}
