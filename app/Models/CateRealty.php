<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CateRealty extends Model
{
    use HasFactory;
    protected $table = 'categories_realty';
    protected $fillable = ['id', 'title', 'image', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable);
        $listCateRealty = $query->paginate(5);
        return $listCateRealty;
    }
}
