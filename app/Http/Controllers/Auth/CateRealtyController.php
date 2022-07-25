<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CateRealty;
use Illuminate\Http\Request;

class CateRealtyController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh mục Bất động sản";
        $this->v['extParams'] = $request->all();

        $objCateRealty = new CateRealty();
        $this->v['listCateRealty'] = $objCateRealty->LoadListWithPager($this->v['extParams']);
        return view('auth.cate-realty.list',$this->v);
    }
}
