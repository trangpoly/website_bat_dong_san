<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateNewRequest;
use App\Models\CateNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CateNewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh sách Danh mục Tin tức";
        $this->v['extParams'] = $request->all();
        $this->v['index'] = 1;

        $objCateNew = new CateNew();
        $this->v['listCateRealty'] = $objCateNew->LoadListWithPager($this->v['extParams']);
        return view('auth.cate-new.list',$this->v);
    }
    //ADD:
    public function add(CateNewRequest $request){
        $this->v['title'] = "Thêm mới Danh mục Tin tức";
        $method_route = 'route_CateNew_add';
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
            $modelCateRealty = new CateNew();
            $img = $request->file('image');
            $pathImg = 'images/cate-new/'.trim($img->getClientOriginalName());
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
        return view('auth.cate-new.add',$this->v);
    }
    //EDIT:
    public function detail($id, CateNewRequest $request){
        $this->v['title'] = "Cập nhật Danh mục Tin tức";
        $objCateNew = new CateNew();
        $this->v['cateNew'] = $objCateNew->detail($id);
        return view('auth.cate-new.detail',$this->v);
    }

    //UPDATE
    public function update($id, CateNewRequest $request){
        $method_route = "route_CateNew_Detail";
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
        $params['cols']['id'] = $id;
        $cateRealty = new CateNew();
        $img = $request->file('image');
        // dd($img);
        if($img == null){
            $res = $cateRealty->saveUpdate($params);
        }
        else {
            $pathImg = 'images/cate-new/'.trim($img->getClientOriginalName());
            $res = $cateRealty->saveUpdate($params,$pathImg);
        }
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
}
