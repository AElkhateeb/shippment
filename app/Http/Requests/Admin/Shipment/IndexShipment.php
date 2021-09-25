<?php

namespace App\Http\Requests\Admin\Shipment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexShipment extends FormRequest
{
    /**
     * Determine if the user is roadized to make this request.
     *
     * @return bool
     */
    public function roadize(): bool
    {
        return Gate::allows('admin.shipment.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,pkg_num,road_id,place_from_id,branch_from_id,place_to_id,branch_to_id,weight,pickup,todoor,express,breakable,shipper_type,shipper_id,receiver_id,status,published_at,end_at,shipp_price,shipp_cost,shipp_sale,shipp_total,payment_method_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }

}
