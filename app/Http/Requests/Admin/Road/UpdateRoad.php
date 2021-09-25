<?php

namespace App\Http\Requests\Admin\Road;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRoad extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.road.edit', $this->road);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'price' => ['sometimes', 'numeric'],
            'time' => ['sometimes', 'numeric'],
            'enabled' => ['sometimes', 'boolean'],
            'pickup' => ['sometimes', 'boolean'],
            'todoor' => ['sometimes', 'boolean'],
            'express' => ['sometimes', 'boolean'],
            'breakable' => ['sometimes', 'boolean'],
            'from_id' => ['sometimes', 'integer'],
            'to_id' => ['sometimes', 'integer'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
