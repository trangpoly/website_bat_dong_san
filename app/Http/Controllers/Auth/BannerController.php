<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh sách Banner";
        $this->v['index'] = 1;
        $this->v['extParams'] = $request->all();

        $objBanner = new Banner();
        $this->v['listBanner'] = $objBanner->LoadListWithPager($this->v['extParams']);
        return view('auth.banner.list',$this->v);
    }
    //ADD
    public function add(BannerRequest $request){
        $this->v['title'] = "Thêm mới Banner";
        $method_route = 'route_Banner_add';
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
            if($request->hasFile('image') && $request->file('image')){
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            $modelBanner = new Banner();
            $res = $modelBanner->saveNew($params);
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
        return view('auth.banner.add',$this->v);
    }
    //EDIT:
    public function detail($id, BannerRequest $request){
        $this->v['title'] = "Cập nhật Banner";
        $objBanner = new Banner();
        $this->v['banner'] = $objBanner->detail($id);
        // dd($this->v['banner']);
        return view('auth.banner.detail',$this->v);
    }

    //UPDATE
    public function update($id, BannerRequest $request){
        $method_route = "route_Banner_Detail";
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
        if($request->hasFile('image') && $request->file('image')){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        $params['cols']['id'] = $id;
        $modelBanner = new Banner();
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
        return $file->storeAs('img_banner',$fileName,'public');
    }
   
}
