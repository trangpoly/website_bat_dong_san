<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateNewRequest extends FormRequest
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
                            'title' => "required", 
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            "title.required" => "Tên danh mục là bắt buộc",
            "image.required" => "Ảnh danh mục là bắt buộc",

        ];
    }
}
