<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AdvancedSearchRequestValidation
 *   Use this class to handle search request validation.
 *
 * @package App\Http\Requests\API
 */
class AdvancedSearchRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_date' => 'nullable|date_format:Y-m-d',
            'to_date' => 'nullable|date_format:Y-m-d',
            'city' => 'nullable|string|size:3',
            'adults_ number' => 'nullable|integer',
        ];
    }
}
