<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CateNewController extends Controller
{
    public function list(){
        return view('auth.cate-new.list');
    }
}
