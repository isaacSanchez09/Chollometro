<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Likes extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|unique:likes,id,' . $this->id,
            'user' => 'required|unique:likes,user,' . Auth::user()->id,
            'id' => Rule::unique('likes')->where(function ($query) {
                return $query->where('user_id', $this->user);
            }),
        ];
    }
}
