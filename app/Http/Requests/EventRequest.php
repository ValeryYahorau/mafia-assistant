<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class EventRequest extends Request {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {    
    if($this->user()->is_admin())
    {
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
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255', 
      'short_title_en' => 'required|max:255',
      'short_title_ru' => 'required|max:255',            
      'date'  => 'required',
      'image' => 'mimes:jpeg,png|max:1024',
    ];
  }    
}