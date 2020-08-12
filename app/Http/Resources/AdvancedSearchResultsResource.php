<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvancedSearchResultsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'provider' => $this->provider,
            'hotelName' => $this->hotelName,
            'rate' => $this->rate,
            'discount' => $this->discount ?? 0,
            'fare' => $this->fare,
            'amenities' => implode(', ', $this->amenities),
        ];
    }
}
