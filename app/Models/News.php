<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['id', 'title', 'image', 'content', 'category_new_id', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable);
        $listNew = $query->paginate(5);
        return $listNew;
    }
}
