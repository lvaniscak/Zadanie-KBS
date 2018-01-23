<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompareFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required',
        ];
    }

    public function messages()
    {
        return ['email.required' => 'Zadajte emailovú adresu !'];
    }

    public function authorize()
    {

        return true;
    }

}