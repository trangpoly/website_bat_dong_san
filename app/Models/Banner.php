<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
