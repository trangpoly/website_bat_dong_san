<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                switch ($currentAction){
                    case 'add':
                        $rules = [
                            'title' => "required|unique:banners", 
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'desc' =>"required"
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'title' => "required", 
                            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            'desc' =>"required"
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
            "title.required" => "Tên Banner là bắt buộc",
            "title.unique" => "Tên Banner đã tồn tại",
            "image.required" => "Ảnh Banner mục là bắt buộc",
            "desc.required" => "Mô tả là bắt buộc",
        ];
    }
}
