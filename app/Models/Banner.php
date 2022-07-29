<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = ['id', 'title', 'image', 'desc', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable);
        $listBanner = $query->paginate(5);
        return $listBanner;
    }
    //ADD
    public function saveNew($params=[],$path){
        $data = array_merge($params['cols'],[
            'image' => $path,
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        $res = DB::table('banners')->insertGetId($data);
        return $res;
    }
    //DETAIL:
    public function detail($id, $params = null){
        $query = DB::table($this->table)
                ->where('id',$id);

        $obj = $query->first();
        return $obj;
    }
}
