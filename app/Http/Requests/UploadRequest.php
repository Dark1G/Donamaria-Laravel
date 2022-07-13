<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //as regras são feitas para serem quebradas menos aqui
    {
        $rules = [ 
        ];
        $img = count($this->input('img'));
        foreach(range(0, $img) as $index) {
            $rules['img.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
 
        return $rules;
    }
}
