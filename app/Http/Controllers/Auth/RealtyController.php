<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RealtyRequest;
use App\Models\CateRealty;
use App\Models\Realty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RealtyController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Bất động sản";
        $this->v['extParams'] = $request->all();
        $this->v['index'] = 1;
        
        $objRealty = new Realty();
        $this->v['listRealty'] = $objRealty->LoadListWithPager($this->v['extParams']);
        return view('auth.realty.list',$this->v);
    }
    //ADD
    public function add(RealtyRequest $request){
        $this->v['title'] = "Thêm mới Bất động sản";
        $modelCateRealty = new CateRealty();
        $this->v['listCate'] = $modelCateRealty->LoadList();
        // dd($this->v['listCate']);
        $method_route = "route_Realty_Add";
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
            // dd($params['cols']['photo_gallery']);
            if($request->hasFile('image') && $request->file('image')){
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            } 
            // dd($params['cols']); 
            $modelNew = new Realty();
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
        return view('auth.realty.add',$this->v);
    }

    //DETAIL:
    public function detail($id, RealtyRequest $request){
        $this->v['title'] = "Chi tiết Bất động sản";
        $modelCaterealty = new CateRealty();
        $this->v['listCate']=$modelCaterealty->LoadList();
        $objRealty = new Realty();
        $this->v['realty'] = $objRealty->detail($id);
        $this->v['photo_gallery'] = $this->v['realty']->photo_gallery;
        // dd($this->v['photo_gallery']);
        return view('auth.realty.detail',$this->v);
    }
    //UPDATE
    public function update($id, RealtyRequest $request){
        $method_route = "route_Realty_Detail";
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
        $modelRealty = new Realty();
        // dd($img);
        $res = $modelRealty->saveUpdate($params);
        
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
        return $file->storeAs('img_realty',$fileName,'public');
    }
    //DELETE
    public function remove($id){
        $method_route = "route_Realty_list";
        // dd($id);
        $modelRealty = new Realty();
        $data = $modelRealty->detail($id);
        $res = $modelRealty->remove($id,$data);
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
