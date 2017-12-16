<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Fixtures_Add_Fixture extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
        [
            'date' => 'required|date',
            'scoreboard1' => 'required|numeric|min:0',
            'scoreboard2' => 'required|numeric|min:0',
            'winner_id' => 'required',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'faults1' => 'required|numeric|min:0',
            'faults2' => 'required|numeric|min:0',
        ];
    }


    public function messages()
    {
        return
        [
            'date.required' => 'We need to know when this match happened.',
            'scoreboard1.required' => 'We need to know how many goals the teams has scored, even if it is 0.',
            'scoreboard2.required' => 'We need to know how many goals the teams has scored, even if it is 0.',
            'winner_id.required' => 'Who wins the match ? I have to know it !',
            'team1_id.required' => 'Who has played this match ?',
            'team2_id.required' => 'Who has played this match ?',
            'faults1.required' => 'Faults done by team1 is required.',
            'faults2.required' => 'Faults done by team2 is required.',
            'faults1.min:0' => 'I know this team is fairplay, but they can not be THIS fairplay.',
            'faults2.min:0' => 'I know this team is fairplay, but they can not be THIS fairplay.',
        ];
    }
}
