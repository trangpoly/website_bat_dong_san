<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CateNew;
use App\Models\CateRealty;
use App\Models\Realty;
use Illuminate\Http\Request;

class RealtyController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }
    public function index($id){
        $this->v['title'] = "Bất động sản";
        $objBanner = new Banner();
        $this->v['banners'] = $objBanner->getAll();
        $objNew = new CateNew();
        $this->v['cateNew'] = $objNew->LoadList();
        $objCateRealty = new CateRealty();
        $this->v['cateRealty'] = $objCateRealty->LoadList();
        $objRealty = new Realty();
        if($id==0){
            $this->v['realty'] = $objRealty->getAll();
        }
        else{
            $this->v['realty'] = $objRealty->filterRealty($id);
        }
        return view('client.realty',$this->v);
    }
    public function realtyDetail($id){
        $this->v['title'] = "Chi tiết Bất động sản";
        $objNew = new CateNew();
        $this->v['cateNew'] = $objNew->LoadList();
        $objCateRealty = new CateRealty();
        $this->v['cateRealty'] = $objCateRealty->LoadList();
        $objRealty = new Realty();
        $this->v['realty'] = $objRealty->detail($id);
        return view('client.realty-detail',$this->v);
    }
    
}
