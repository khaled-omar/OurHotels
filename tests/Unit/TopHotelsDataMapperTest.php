<?php

namespace Tests\Unit;

use App\DataMappers\TopHotelsDataDataMapper;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use Tests\Factories\TopHotelsDataFactory;

/**
 * Class TopHotelsDataMapperTest
 *
 * @package Tests\Unit
 */
class TopHotelsDataMapperTest extends TestCase
{
    /**
     * @var TopHotelsDataFactory $topHotelsDataFactory
     */
    protected $topHotelsDataFactory;

    /**
     * TopHotelsDataMapperTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->topHotelsDataFactory = resolve(TopHotelsDataFactory::class);
    }

    /**
     * Test mapping filters.
     *
     * @return void
     */
    public function testMapFilters()
    {
        $bestHotelsDataMapper = new TopHotelsDataDataMapper();
        $actual = $bestHotelsDataMapper->mapFilters([
            "from_date" => "2011-12-05",
            "to_date" => "2011-12-05",
            "city" => "CAI",
            "adults_ number" => 5,
        ]);
        $expected = [
            'from' => '2011-12-05T00:00:00Z',
            'To' => '2011-12-05T00:00:00Z',
            'city' => 'CAI',
            'adultsCount' => 5,
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
        $topHotelsDataMapper = new TopHotelsDataDataMapper();
        $actual = $topHotelsDataMapper->mapFilters($filters);
        $this->assertEmpty($actual);
    }

    /**
     * Test mapping responses.
     *
     * @return void
     */
    public function testMapResponse()
    {
        $items = $this->topHotelsDataFactory->getItems();
        $items = json_decode(json_encode($items));
        $topHotelsDataMapper = new TopHotelsDataDataMapper();
        $actual = $topHotelsDataMapper->mapResponse($items);

        $expected = $this->topHotelsDataFactory->generateFakeTopHotels();

        $this->assertInstanceOf(Collection::class, $actual);
        $this->assertEquals($expected, $actual);
    }
}
