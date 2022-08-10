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
        // $this->v['cateNew'] = $objNew->category();
        // dd($objNew->category());
        // dd($this->v['listNew']);
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
            if($request->hasFile('image') && $request->file('image')){
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }  
            $modelNew = new News();
            $res = $modelNew->saveNew($params);
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
        $this->v['title'] = "Chi tiết Tin tức";
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
        // dd($params['cols']['content']);
        unset($params['cols']['_token']);
        if($request->hasFile('image') && $request->file('image')){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }  
        $params['cols']['id'] = $id;
        $cateRealty = new News();
        // dd($img);
        $res = $cateRealty->saveUpdate($params);
        
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
        return $file->storeAs('img_new',$fileName,'public');
    }
    //DELETE
    public function remove($id){
        $method_route = "route_New_list";
        // dd($id);
        $modelNew = new News();
        $data = $modelNew->detail($id);
        $res = $modelNew->remove($id,$data);
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
