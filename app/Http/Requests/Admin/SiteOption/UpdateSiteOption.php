<?php

namespace App\Http\Requests\Admin\SiteOption;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSiteOption extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.site-option.edit', $this->siteOption);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'weight_default' => ['sometimes', 'numeric'],
            'weight_fee' => ['sometimes', 'numeric'],
            'pickup' => ['sometimes', 'boolean'],
            'pickup_fee' => ['sometimes', 'numeric'],
            'todoor' => ['sometimes', 'boolean'],
            'todoor_fee' => ['sometimes', 'numeric'],
            'express' => ['sometimes', 'boolean'],
            'express_fee' => ['sometimes', 'numeric'],
            'breakable' => ['sometimes', 'boolean'],
            'breakable_fee' => ['sometimes', 'numeric'],
            
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
