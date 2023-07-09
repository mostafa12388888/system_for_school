<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherValidate extends FormRequest
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
            'Email'=>'required|unique:teachers,Email,'.$this->id,
            'Name_ar'=>'required',
            'Name_en'=>'required',
            'Gender_id'=>'required',
            'Joining_Date'=>'required',
            'Specialization_id'=>'required',
            'Address'=>'required',
            'Password'=>'required|min:8|max:19',
        ];
    }
    public function messages()
    {
        return [
'Name_ar.required'=>trans('validation.required'),
'Name_ar.unique'=>trans('validation.unique'),
'Name_en.required'=>trans('validation.required'),
'Name_en.unique'=>trans('validation.unique'),
'Name_en.unique'=>trans('validation.min'),
'Name_en.unique'=>trans('validation.max'),
        ];
    }
}
