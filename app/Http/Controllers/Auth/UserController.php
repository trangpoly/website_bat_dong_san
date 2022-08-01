<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $this->v['index'] = 1;

        $objUser = new User();
        $this->v['listUser'] = $objUser->LoadListWithPager($this->v['extParams']);
        return view('auth.user.list',$this->v);
    }
    public function add(UserRequest $request){
        $this->v['title']="Thêm mới Người dùng";
        $method_route = 'route_User_add';
        if($request->isMethod('post')){
            $params = [];
            // dd($request->post());
            $params['cols'] = array_map(function($item){
                if($item == 'null'){
                    $item = null;
                }
                if(is_string($item)){
                    $item = trim($item);
                }
                return $item;
            },
            $request->post());
            unset($params['cols']['_token']);
            // dd($params);
            $modelCateRealty = new User();
            $img = $request->file('avatar');
            $pathImg = 'images/user/'.trim($img->getClientOriginalName());
            // dd($pathImg);
            $modelCateRealty->image = $pathImg;
            $res = $modelCateRealty->saveNew($params,$pathImg);
            if($res==null){
                redirect()->route($method_route);
            }
            elseif ($res > 0){
                Session::flash('success','Thêm mới thành công!');
            }
            else {
                Session::flash('error','Thêm mới thất bại!');
                redirect()->route($method_route);
            }

        }
        return view('auth.user.add',$this->v);
    }
}
