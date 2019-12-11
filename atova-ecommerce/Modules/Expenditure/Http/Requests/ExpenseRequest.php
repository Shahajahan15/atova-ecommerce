<?php

namespace Modules\Expenditure\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'                  => 'required',
            'employees_id'          => 'required',
            'recipient_id'          => 'required',
            'expense_category_id'   => 'required',
            'payment_methods_id'    => 'required',
            'amount'                => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
