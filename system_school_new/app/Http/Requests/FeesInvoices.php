<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesInvoices extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'List_Fees.*.student_id'=>'required',
            'List_Fees.*.fee_id'=>'required',
            'List_Fees.*.amount'=>'required',
            'List_Fees.*.description'=>'required',
        ];
       
        
    }
    public function messages()
    {
        return [
            'List_Fees.*.student_id.required'=>trans('validation.required'),
            'List_Fees.*.fee_id.required'=>trans('validation.required'),
            'List_Fees.*.amount.required'=>trans('validation.required'),
            'List_Fees.*.description.required'=>trans('validation.required'),
        ];
    }
}
