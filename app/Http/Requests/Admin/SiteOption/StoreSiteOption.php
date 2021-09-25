<?php

namespace App\Http\Requests\Admin\SiteOption;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSiteOption extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.site-option.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'weight_default' => ['required', 'numeric'],
            'weight_fee' => ['required', 'numeric'],
            'pickup' => ['required', 'boolean'],
            'pickup_fee' => ['required', 'numeric'],
            'todoor' => ['required', 'boolean'],
            'todoor_fee' => ['required', 'numeric'],
            'express' => ['required', 'boolean'],
            'express_fee' => ['required', 'numeric'],
            'breakable' => ['required', 'boolean'],
            'breakable_fee' => ['required', 'numeric'],
            
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
