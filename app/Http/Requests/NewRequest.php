<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        // dd($currentAction);
        switch ($this->method()):
            case 'POST': 
                switch($currentAction){
                    case 'add':
                        $rules = [
                            'title' => "required|unique:news",
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'content' => 'required'
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'title' => "required",
                            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'content' => 'required'
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
            endswitch;
            return $rules;
    }
    public function messages()
    {
        return [
            "title.required" => "Tiêu đề là bắt buộc",
            "title.unique" => "Tiêu đề tin tức đã tồn tại",
            "image.required" => "Ảnh đại diện là bắt buộc",
            "content.required" => "Nội dung tin tức là bắt buộc"
        ];
    }
}
