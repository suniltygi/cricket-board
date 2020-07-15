<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'team_one' => 'required|exists:teams,id',
            'team_two' => 'required|different:team_one|exists:teams,id',
            'match_date' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'team_two.different' => 'Team Two must be different from team one',
        ];
    }
}
