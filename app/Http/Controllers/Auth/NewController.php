<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v=[];
    }

    public function list(Request $request){
        $this->v['title'] = "Tin tức";
        $this->v['extParams'] = $request->all();

        $objNew = new News();
        $this->v['listNew'] = $objNew->LoadListWithPager($this->v['extParams']);
        return view('auth.new.list',$this->v);
    }
}
