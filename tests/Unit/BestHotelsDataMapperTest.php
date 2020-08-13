<?php

namespace Tests\Unit;

use App\DataMappers\BestHotelsDataDataMapper;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Tests\Factories\BestHotelsDataFactory;

/**
 * Class BestHotelsDataMapperTest
 *
 * @package Tests\Unit
 */
class BestHotelsDataMapperTest extends TestCase
{
    /**
     * @var BestHotelsDataFactory $bestHotelsDataFactory
     */
    protected $bestHotelsDataFactory;

    /**
     * BestHotelsDataMapperTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->bestHotelsDataFactory = resolve(BestHotelsDataFactory::class);
    }

    /**
     * Test mapping filters.
     *
     * @return void
     */
    public function testMapFilters()
    {
        $bestHotelsDataMapper = new BestHotelsDataDataMapper();
        $actual = $bestHotelsDataMapper->mapFilters([
            "from_date" => "2011-12-05",
            "to_date" => "2011-12-05",
            "city" => "CAI",
            "adults_ number" => 5,
        ]);
        $expected = [
            'fromDate' => '2011-12-05',
            'toDate' => '2011-12-05',
            'city' => 'CAI',
            'numberOfAdults' => 5,
        ];

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test empty filters mapping.
     *
     * @return void
     */
    public function testEmptyMapFilters()
    {
        $filters = [];
        $bestHotelsDataMapper = new BestHotelsDataDataMapper();
        $actual = $bestHotelsDataMapper->mapFilters($filters);
        $this->assertEmpty($actual);
    }

    /**
     * Test mapping responses.
     *
     * @return void
     */
    public function testMapResponse()
    {
        $items = $this->bestHotelsDataFactory->getItems();
        $items = json_decode(json_encode($items));
        $bestHotelsDataMapper = new BestHotelsDataDataMapper();
        $actual = $bestHotelsDataMapper->mapResponse($items);

        $expected = $this->bestHotelsDataFactory->generateFakeBestHotels();

        $this->assertInstanceOf(Collection::class, $actual);
        $this->assertEquals($expected, $actual);
    }
}
