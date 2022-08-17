<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CateNew;
use App\Models\CateRealty;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index($id){
        $this->v['title'] = "Tin tức";
        $objBanner = new Banner();
        $this->v['banners'] = $objBanner->getAll();
        $objNew = new CateNew();
        $this->v['cateNew'] = $objNew->LoadList();
        $objCateRealty = new CateRealty();
        $this->v['cateRealty'] = $objCateRealty->LoadList();
        $objNew = new News();
        if($id==0){
            $this->v['news'] = $objNew->getAll();
        }
        else{
            $this->v['news'] = $objNew->filterRealty($id);
        }
        return view('client.new',$this->v);
    }
    public function newDetail($id){
        $this->v['title']="Chi tiết Tin tức";
        $objNew = new CateNew();
        $this->v['cateNew'] = $objNew->LoadList();
        $objCateRealty = new CateRealty();
        $this->v['cateRealty'] = $objCateRealty->LoadList();
        $objNew = new News();
        $this->v['new'] = $objNew->detail($id);
        return view('client.new-detail',$this->v);
    }
}
