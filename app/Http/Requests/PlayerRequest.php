<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class PlayerRequest extends Request
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
            'name_en' => 'max:255',
            'name_ru' => 'required|max:255',
            'real_name' => 'required|max:255',
            'image' => 'mimes:jpeg,png|max:1024',
        ];
    }
}