<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CateNew extends Model
{
    use HasFactory;
    protected $table = 'categories_new';
    protected $fillable = ['id', 'title', 'image', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable);
        $listCateNew = $query->paginate(5);
        return $listCateNew;
    }
    //ADD
    public function saveNew($params=[],$path){
        $data = array_merge($params['cols'],[
            'image' => $path,
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        $res = DB::table('categories_new')->insertGetId($data);
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
