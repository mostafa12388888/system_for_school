<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeGrades extends FormRequest
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
            'Name_ar'=>'required|unique:grates,Name->ar,'.$this->id,
            'Name_en'=>'required|unique:grates,Name->en,'.$this->id
        ];
    }
    public function messages()
    {
        return [
'Name_ar.required'=>trans('validation.required'),
'Name_ar.unique'=>trans('validation.unique'),
'Name_en.required'=>trans('validation.required'),
'Name_en.unique'=>trans('validation.unique')
        ];
    }
}
