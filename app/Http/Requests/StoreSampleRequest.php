<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSampleRequest extends FormRequest
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
            'sam_nom' => 'required|string|unique:sample',
            'sample' => 'required|max:8000000', // Fichier pas plus lourd que 7Mo
            'prix' => 'required',
            'sam_poche' =>'required|image',
            
        ];
    }
}
