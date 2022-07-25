<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Realty extends Model
{
    use HasFactory;
    protected $table = 'realty';
    protected $fillable = ['id', 'title', 'price', 'bed', 'bath', 'area', 'phone', 'address', 'email', 'short_desc', 'desc', 'photo_gallery', 'image', 'category_realty_id', 'in_stock','status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable);
        $listRealty = $query->paginate(5);
        return $listRealty;
    }
}
