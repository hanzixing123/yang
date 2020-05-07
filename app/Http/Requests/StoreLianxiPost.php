<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLianxiPost extends FormRequest
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
            "title"=>"required|unique:lianxi|regex:/^[\x{4e00}-\x{9fa5}\w]{2,20}$/u",
            "c_id"=>"required",
        ];
    }

     public function messages(){
        return [
            "title.required"=>"文章名称必填",
            "title.unique"=>"文章已存在",
            "title.regex"=>"品牌名称最大为20位",
            "c_id.required"=>"类型不可为空",
        ];

    }

}
