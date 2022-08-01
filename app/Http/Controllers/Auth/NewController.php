<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\CateNew;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh sách Tin tức";
        $this->v['index'] = 1;
        $this->v['extParams'] = $request->all();

        $objNew = new News();
        $this->v['listNew'] = $objNew->LoadListWithPager($this->v['extParams']);
        // $this->v['cateNew'] = $objNew->getCate();
        // dd($this->v['cateNew']);
        return view('auth.new.list',$this->v);
    }
    //ADD
    public function add(NewRequest $request){
        $this->v['title']="Thêm mới Tin tức";
        $modelCateNew = new CateNew();
        $this->v['listCate']=$modelCateNew->LoadList();
        $method_route="route_New_Add";
        if($request->isMethod('post')){
            $params = [];
            // dd($request->post);
            $params['cols'] = array_map(function($item){
                if($item==''){
                    $item = null;
                }
                if(is_string($item)){
                    $item = trim($item);
                }
                return $item;
            },
            $request->post());
            unset($params['cols']['_token']);    
            $modelNew = new News();
            $img = $request->file('image');
            $pathImg = 'images/new/'.trim($img->getClientOriginalName());
            // dd($pathImg);
            $modelNew->image = $pathImg;
            $res = $modelNew->saveNew($params,$pathImg);
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
        return view('auth.new.add',$this->v);
    }

    //DETAIL:
    public function detail($id, NewRequest $request){
        $this->v['title'] = "Cập nhật Tin tức";
        $modelCateNew = new CateNew();
        $this->v['listCate']=$modelCateNew->LoadList();
        $objNew = new News();
        $this->v['new'] = $objNew->detail($id);
        return view('auth.new.detail',$this->v);
    }

    //UPDATE
    public function update($id, NewRequest $request){
        $method_route = "route_New_Detail";
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
        $cateRealty = new News();
        $img = $request->file('image');
        // dd($img);
        if($img == null){
            $res = $cateRealty->saveUpdate($params);
        }
        else {
            $pathImg = 'images/new/'.trim($img->getClientOriginalName());
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
