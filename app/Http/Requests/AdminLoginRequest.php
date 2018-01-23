<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AdminLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Zadajte emailovú adresu!',
            'password.required' => 'Zadajte heslo!',
        ];
    }

    public function authorize()
    {

        return true;
    }

}