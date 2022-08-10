<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => "Email là bắt buộc",
            'email.email' => "Email sai định dạng",
            'password.required' => "Password là bắt buộc"
        ];

        $validated = Validator::make($request->all(), $rules, $messages);
        // dd($validated);
        if($validated->fails()){
            return redirect('signin')->withErrors($validated)->withInput();
        }
        else {
            //Nhận dữ liệu bên Login gửi sang
            $email = $request->input('email');
            $password = $request->input('password');
            //Ktra đăng nhập
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                Mail::to($email)->send(new Login(['content'=>'Đăng nhập thành công']));
                return redirect('admin');
            }
            else{
                Session::flash('error','Email hoặc Password không đúng');
                return redirect('signin');
            }
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/signin');
    }
}
