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
            // dd($params['cols']); 
            $modelNew = new Realty();
            $img = $request->file('image');
            $pathImg = 'images/realty/'.trim($img->getClientOriginalName());
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
        return view('auth.realty.add',$this->v);
    }

    //DETAIL:
    public function detail($id, RealtyRequest $request){
        $this->v['title'] = "Cập nhật Tin tức";
        $modelCaterealty = new CateRealty();
        $this->v['listCate']=$modelCaterealty->LoadList();
        $objRealty = new Realty();
        $this->v['realty'] = $objRealty->detail($id);
        $this->v['photo_gallery'] = $this->v['realty']->photo_gallery;
        // dd($this->v['photo_gallery']);
        return view('auth.realty.detail',$this->v);
    }
}
