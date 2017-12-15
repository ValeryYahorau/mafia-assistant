<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class GameRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->is_admin()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'player1' => 'required',
            'player2' => 'required',
            'player3' => 'required',
            'player4' => 'required',
            'player5' => 'required',
            'player6' => 'required',
            'player7' => 'required',
            'player8' => 'required',
            'player9' => 'required',
            'player10' => 'required',
            'type' => 'required'
        ];
    }
}