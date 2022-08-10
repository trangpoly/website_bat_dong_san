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
            if($request->hasFile('avatar') && $request->file('avatar')){
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }
            $modelCateRealty = new User();
            $res = $modelCateRealty->saveNew($params);
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
    //DETAIL:
    public function detail($id, UserRequest $request){
        $this->v['title'] = "Thông tin Người dùng";
        $objUser = new User();
        $this->v['user'] = $objUser->detail($id);
        return view('auth.user.detail',$this->v);
    }
    //UPDATE
    public function update($id, UserRequest $request){
        $method_route = "route_User_Detail";
        $params=[];
        //Lọc dữ liệu
        $params['cols'] = array_map(function($item){
            if($item == ""){
                $item = null;
            }
            if(is_string($item)){
                $item = trim($item);
            }
            return $item;
        }, 
        $request->post());
        //
        unset($params['cols']['_token']);
        if($request->hasFile('avatar') && $request->file('avatar')){
            $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
        }
        $params['cols']['id'] = $id;
        $modelBanner = new User();
        $res = $modelBanner->saveUpdate($params);
        if($res==null){
            return redirect()->route($method_route,['id'=>$id]);
        }
        elseif ($res > 0){
            Session::flash('success',"Cập nhật thành công!");
            return redirect()->route($method_route,['id'=>$id]);
        }
        else {
            Session::flash('error',"Cập nhật thất bại");
            return redirect()->route($method_route,['id'=>$id]);
        }
    }

    //UPLOAD IMG
    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('img_user',$fileName,'public');
    }
    //DELETE
    public function remove($id){
        $method_route = "route_User_list";
        // dd($id);
        $modelUser = new User();
        $data = $modelUser->detail($id);
        $res = $modelUser->remove($id,$data);
        if($res==null){
            return redirect()->route($method_route);
        }
        elseif ($res > 0){
            Session::flash('success',"Xóa bản ghi thành công!");
            return redirect()->route($method_route);
        }
        else {
            Session::flash('error',"Xóa bản ghi thất bại");
            return redirect()->route($method_route);
        }
    }
}
