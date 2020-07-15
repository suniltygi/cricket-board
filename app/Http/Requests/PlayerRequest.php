<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'team' => 'required|exists:teams,id',
            'first_name' => 'required|min:2|max:50|alpha_spaces',
            'last_name' => 'required|min:2|max:50|alpha_spaces',
            'country' => 'required|min:2|max:50|alpha_spaces',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'jersey_number' => 'required|integer',
            'matches' => 'required|integer',
            'runs' => 'required|integer',
            'highest_score' => 'required|integer|lte:runs',
            'fifties' => 'required|integer|lte:matches',
            'hundreds' => 'required|integer|lte:matches',
        ];
    }
}
