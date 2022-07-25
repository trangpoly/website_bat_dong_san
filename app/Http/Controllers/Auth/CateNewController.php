<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CateNew;
use Illuminate\Http\Request;

class CateNewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh mục Tin tức";
        $this->v['extParams'] = $request->all();

        $objCateNew = new CateNew();
        $this->v['listCateRealty'] = $objCateNew->LoadListWithPager($this->v['extParams']);
        return view('auth.cate-new.list',$this->v);
    }
}
