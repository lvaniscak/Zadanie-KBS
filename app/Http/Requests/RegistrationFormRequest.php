<?php namespace App\Http\Requests;

use App\Hobbies\Hobby;
use App\Users\User;
use Illuminate\Foundation\Http\FormRequest;



class RegistrationFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|unique:users',
            'name' => 'required',
            'swimming' => 'required|integer|between:1,5',
            'cycling' => 'required|integer|between:1,5',
            'running' => 'required|integer|between:1,5',
            'tourism' => 'required|integer|between:1,5',
            'climbing' => 'required|integer|between:1,5',
            ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Zadajte emailovú adresu!',
            'email.unique' => 'Tento email je už používaný!',
            'name.required' => 'Zadajte meno!',
            'swimming.required' => 'Vyberte ako sa vám páči plávanie!',
            'cycling.required' => 'Vyberte ako sa vám páči byciklovanie!',
            'running.required' => 'Vyberte ako sa vám páči beh!',
            'tourism.required' => 'Vyberte ako sa vám páči turistika!',
            'climbing.required' => 'Vyberte ako sa vám páči lezenie!',
            'between' => 'Vyberte ako veľmi máte radi túto záľubu!',
        ];
    }

    public function authorize()
    {

        return true;
    }

}