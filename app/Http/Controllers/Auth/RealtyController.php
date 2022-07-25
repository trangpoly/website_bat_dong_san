<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Realty;
use Illuminate\Http\Request;

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

        $objRealty = new Realty();
        $this->v['listRealty'] = $objRealty->LoadListWithPager($this->v['extParams']);
        return view('auth.realty.list',$this->v);
    }
}
