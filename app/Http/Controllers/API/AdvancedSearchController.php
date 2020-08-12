<?php

namespace App\Http\Controllers\API;

use App\Contracts\OurHotelsServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\AdvancedSearchRequestValidation as RequestValidation;
use App\Http\Resources\AdvancedSearchResultsResource;

/**
 * Class AdvancedSearchController
 *    Use this controller to handle search functionality.
 *
 * @package App\Http\Controllers\API
 */
class AdvancedSearchController extends Controller
{
    /**
     * Service to handle the search functionality business logic.
     *
     * @var \App\Services\OurHotelsService $service
     */
    protected $service;

    /**
     * AdvancedSearchController constructor.
     *
     * @param \App\Contracts\OurHotelsServiceInterface $service
     */
    public function __construct(OurHotelsServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Handle search endpoint with filters.
     *
     * @param RequestValidation $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Exception
     */
    public function search(RequestValidation $request)
    {
        $filters = $request->validated();
        $items = $this->service->getAvailableHotels($filters);

        return AdvancedSearchResultsResource::collection($items);
    }
}
