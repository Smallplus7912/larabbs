<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    public function message(){
        return[
            'name.unique'=>'用户名已被占用，请更换',
            'name.regex'=>'用户名仅支持英文、数字、横杠和下划线',
            'name.between'=>'用户名须介于3~25个字符之间',
            'name.required'=>'用户名不能为空',
        ];
    }
}
