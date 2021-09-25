<?php

namespace App\Http\Requests\Admin\Shipment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreShipment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.shipment.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'pkg_num' => ['required', 'integer'],
            'road' => ['required', 'integer'],
            'place_from_id' => ['required', 'integer'],
            'branch_from_id' => ['required', 'integer'],
            'place_to_id' => ['required', 'integer'],
            'branch_to_id' => ['required', 'integer'],
            'weight' => ['required', 'numeric'],
            'pickup' => ['required', 'boolean'],
            'todoor' => ['required', 'boolean'],
            'express' => ['required', 'boolean'],
            'breakable' => ['required', 'boolean'],
            'shipper_type' => ['required', 'string'],
            'shipper_id' => ['required', 'string'],
            'receiver_id' => ['nullable', 'integer'],
            'status' => ['required', 'string'],
            'published_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'shipp_price' => ['required', 'string'],
            'shipp_cost' => ['required', 'string'],
            'shipp_sale' => ['required', 'string'],
            'shipp_total' => ['required', 'string'],
            'payment_method_id' => ['nullable', 'integer'],

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
    public function getRoadId(){
        if ($this->has('road')){
            return $this->get('road')['id'];
        }
        return null;
    }
}
