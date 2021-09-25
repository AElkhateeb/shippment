<?php

namespace App\Http\Requests\Admin\Withdrawal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreWithdrawal extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.withdrawal.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'price' => ['required', 'numeric'],
            'reason_type' => ['required', 'string'],
            'reason_id' => ['required', 'string'],
            'made_type' => ['required', 'string'],
            'made_id' => ['required', 'string'],
            'in_out' => ['required', 'boolean'],
            'enabled' => ['required', 'boolean'],
            'from_id' => ['required', 'integer'],
            'to_id' => ['required', 'integer'],
            'payment_method_id' => ['required', 'integer'],
            
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
