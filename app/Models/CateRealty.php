<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CateRealty extends Model
{
    use HasFactory;
    protected $table = 'categories_realty';
    protected $fillable = ['id', 'title', 'image', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable)
                ->where('status',0);
        $listCateRealty = $query->paginate(5);
        return $listCateRealty;
    }
    public function LoadList($params=[]){
        $listCate = DB::table($this->table)
                ->select($this->fillable)
                ->where('status',0)
                ->get();
        return $listCate;
    }
    //ADD
    public function saveNew($params=[]){
        $data = array_merge($params['cols'],[
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    //DETAIL:
    public function detail($id, $params = null){
        $query = DB::table($this->table)
                ->where('id',$id);

        $obj = $query->first();
        return $obj;
    }

    //UPDATE
    public function saveUpdate($params, $path=[]){
        if(empty($params['cols']['id'])){
            Session::flash('error', "Không xác định bản ghi cập nhật");
            return null;
        }
        $dataUpdate = array_merge($params['cols'],[
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        
        
        //Lọc dữ liệu
        foreach($params['cols'] as $colName => $val){
            if($colName == 'id') continue;
            if(in_array($colName, $this->fillable)){
                $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
                ->where('id',$params['cols']['id'])
                ->update($dataUpdate);
        return $res;

    }
    //DELETE
    public function remove($id){
        if(empty($id)){
            Session::flash('error', "Không xác định bản ghi cập nhật");
            return null;
        }
        $dataRemove = array_merge([
            'status' => 1,
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
        $res = DB::table($this->table)
                ->where('id',$id)
                ->update($dataRemove);
        DB::table('realty')
                ->where('category_realty_id', $id)
                ->update(['status' => 1]);
        Session::flash('success','Xóa bản ghi thành công!');
        return $res;
    }
}
