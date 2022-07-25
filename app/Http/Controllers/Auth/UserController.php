<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Người dùng";
        $this->v['extParams'] = $request->all();

        $objUser = new User();
        $this->v['listUser'] = $objUser->LoadListWithPager($this->v['extParams']);
        return view('auth.user.list',$this->v);
    }
}
