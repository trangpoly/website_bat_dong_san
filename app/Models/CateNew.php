<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
