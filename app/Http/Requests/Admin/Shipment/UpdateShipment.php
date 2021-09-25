<?php

namespace App\Http\Requests\Admin\Shipment;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateShipment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.shipment.edit', $this->shipment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'pkg_num' => ['sometimes', 'integer'],
            'road' => ['sometimes', 'integer'],
            'place_from_id' => ['sometimes', 'integer'],
            'branch_from_id' => ['sometimes', 'integer'],
            'place_to_id' => ['sometimes', 'integer'],
            'branch_to_id' => ['sometimes', 'integer'],
            'weight' => ['sometimes', 'numeric'],
            'pickup' => ['sometimes', 'boolean'],
            'todoor' => ['sometimes', 'boolean'],
            'express' => ['sometimes', 'boolean'],
            'breakable' => ['sometimes', 'boolean'],
            'shipper_type' => ['sometimes', 'string'],
            'shipper_id' => ['sometimes', 'string'],
            'receiver_id' => ['nullable', 'integer'],
            'status' => ['sometimes', 'string'],
            'published_at' => ['sometimes', 'date'],
            'end_at' => ['sometimes', 'date'],
            'shipp_price' => ['sometimes', 'string'],
            'shipp_cost' => ['sometimes', 'string'],
            'shipp_sale' => ['sometimes', 'string'],
            'shipp_total' => ['sometimes', 'string'],
            'payment_method_id' => ['nullable', 'integer'],
            'publish_now' => ['nullable', 'boolean'],
            'unpublish_now' => ['nullable', 'boolean'],

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

        if (isset($sanitized['publish_now']) && $sanitized['publish_now'] === true) {
            $sanitized['published_at'] = Carbon::now();
        }

        if (isset($sanitized['unpublish_now']) && $sanitized['unpublish_now'] === true) {
            $sanitized['published_at'] = null;
        }

        //Add your code for manipulation with request data here

        return $sanitized;
    }
    public function getRoadId(){
        if ($this->has('road')){
            return $this->get('road')['id'];
        }
        return null;
    }
}
