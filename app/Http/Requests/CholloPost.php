<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CholloPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:1',
            'price_sale' => 'required|numeric|min:0',
            'url' => 'required',
            'category' => 'required',
            'photo' => ['required',
                File::image()
            ]
        ];
    }
}
