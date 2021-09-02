<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'email' => 'string|email|max:255',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'string|max:255',
        ];
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return $rules =[
            
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
        ];
    }
}

