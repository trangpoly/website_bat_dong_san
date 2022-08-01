<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()):
            case 'POST':
                switch ($currentAction){
                    case 'add':
                        $rules = [
                            "name" => 'required',
                            "email" => 'required|email',
                            "password" => 'required',
                            "avatar" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            "address" => 'required',
                            "role" => 'required'
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
            "name.required" => "Họ và tên là bắt buộc",
            "email.required" => "Email là bắt buộc",
            "email.email" => "Email chưa đúng định dạng",
            "password.required" => "Password là bắt buộc",
            "avatar.required" => "Ảnh đại diện là bắt buộc",
            "address.required" => "Địa chỉ là bắt buộc",
            "role.required" => "Phân quyền là bắt buộc"
        ];
    }
}
