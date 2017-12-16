<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Players_Add_Player extends FormRequest
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
            'name' => 'required|min:3|max:15',
            'birthdate' => 'required|date',
            'team_id' => 'required',
            'HP' => 'required|numeric|min:0|max:100',
            'SP' => 'required|numeric|min:0|max:100',
            'EN' => 'required|numeric|min:0|max:100',
            'AT' => 'required|numeric|min:0|max:100',
            'PA' => 'required|numeric|min:0|max:100',
            'BL' => 'required|numeric|min:0|max:100',
            'SH' => 'required|numeric|min:0|max:100',
            'CA' => 'required|numeric|min:0|max:100'
        ];
    }


    public function messages()
    {
        return
        [
            'name.required' => 'The player has probably a name, so please tell us what it is.',
            'name.min' => "It is not legal to have a name this short. Please make it longer.",
            'name.max' => "Player's name can not be this long. Give him a shortname.",
            'birthdate.required' => 'We need to know how old is the player. For safety reason.',
            'HP.required' => 'We need to know how much HP the player has.',
            'SP.required' => 'We need to know how much SP the player has.',
            'EN.required' => 'We need to know how much EN the player has.',
            'AT.required' => 'We need to know how much AT the player has.',
            'PA.required' => 'We need to know how much PA the player has.',
            'BL.required' => 'We need to know how much BL the player has.',
            'SH.required' => 'We need to know how much SH the player has.',
            'CA.required' => 'We need to know how much CA the player has.',
            'HP.min' => 'Hit Points can not be lower than 0.',
            'SP.min' => 'Speed can not be lower than 0.',
            'EN.min' => 'Endurance can not be lower than 0.',
            'AT.min' => 'Attack can not be lower than 0.',
            'PA.min' => 'Passing can not be lower than 0.',
            'BL.min' => 'Block can not be lower than 0.',
            'SH.min' => 'Shooting can not be lower than 0.',
            'CA.min' => 'Catching can not be lower than 0.',
            'HP.max' => 'Hit Points can not be greater than 100.',
            'SP.max' => 'Speed can not be greater than 100.',
            'EN.max' => 'Endurance can not be greater than 100.',
            'AT.max' => 'Attack can not be greater than 100.',
            'PA.max' => 'Passing can not be greater than 100.',
            'BL.max' => 'Block can not be greater than 100.',
            'SH.max' => 'Shooting can not be greater than 100.',
            'CA.max' => 'Catching can not be greater than 100.',
        ];
    }
}
