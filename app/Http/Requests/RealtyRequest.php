<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealtyRequest extends FormRequest
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
                            'title' => "required|unique:realty", 
                            'price' => "required",
                            'bed' => "required",
                            'bath' => "required",
                            'area' => "required",
                            "phone" => "required",
                            "address" => "required",
                            "email" => "required|email",
                            "short_desc" => "required",
                            "desc" => "required",
                            "photo_gallery" => "required",
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                        ];
                        break;
                    case 'update':
                        $rules = [
                            'title' => "required", 
                            'price' => "required",
                            'bed' => "required",
                            'bath' => "required",
                            'area' => "required",
                            "phone" => "required",
                            "address" => "required",
                            "email" => "required|email",
                            "short_desc" => "required",
                            "desc" => "required",
                            // "photo_gallery" => "required",
                            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
            "title.required" => "Tên Bất động sản là bắt buộc",
            "title.unique" => "Tên Bất động sản đã tồn tại",
            'price.required' => "Giá Bất động sản là bắt buộc",
            'bed.required' => "Số phòng ngủ là bắt buộc",
            'bath.required' => "Số phòng tắm là bắt buộc",
            'area.required' => "Diện tích là bắt buộc",
            "phone.required" => "Số điện thoại là bắt buộc",
            "address.required" => "Địa chỉ là bắt buộc",
            "email.required" => "Email là bắt buộc",
            "email.email" => "Email sai định dạng",
            "short_desc.required" => "Mô tả ngắn là bắt buộc",
            "desc.required" => "Mô tả là bắt buộc",
            "photo_gallery.required" => "Thư viện ảnh là bắt buộc",
            "image.required" => "Ảnh danh mục là bắt buộc"

        ];
    }
}
