<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CateNew;
use App\Models\CateRealty;
use App\Models\News;
use App\Models\Realty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }
    public function index(){
        $this->v['title'] = "Trang chủ";
        $objBanner = new Banner();
        $this->v['banners'] = $objBanner->getAll();
        $objNew = new CateNew();
        $this->v['cateNew'] = $objNew->LoadList();
        $objCateRealty = new CateRealty();
        $this->v['cateRealty'] = $objCateRealty->LoadList();
        $objRealty = new Realty();
        $this->v['realty'] = $objRealty->getAll();
        $objNew = new News();
        $this->v['new'] = $objNew->getAll();
        return view('client.index',$this->v);
    }
}
