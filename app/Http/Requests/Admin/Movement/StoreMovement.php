<?php

namespace App\Http\Requests\Admin\Movement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMovement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.movement.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'reason' => ['nullable', 'string'],
            'shipment_id' => ['required', 'integer'],
            'method_id' => ['required', 'integer'],
            'employee_type' => ['required', 'string'],
            'employee_id' => ['required', 'string'],
            'branch_id' => ['required', 'integer'],
            'method_parent_id' => ['nullable', 'integer'],
            
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
