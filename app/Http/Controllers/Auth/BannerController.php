<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Danh mục Bất động sản";
        $this->v['extParams'] = $request->all();

        $objBanner = new Banner();
        $this->v['listBanner'] = $objBanner->LoadListWithPager($this->v['extParams']);
        return view('auth.banner.list',$this->v);
    }
}
