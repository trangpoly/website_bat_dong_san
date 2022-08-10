<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    //Code:
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'password', 'avatar', 'address', 'role', 'status'];


    public function LoadListWithPager($params=[]){
        $query = DB::table($this->table)
                ->select($this->fillable)
                ->where('status',0);
        $listUsers = $query->paginate(5);
        return $listUsers;
    }
    //ADD
    public function saveNew($params=[]){
        $data = array_merge($params['cols'],[
            'password' => Hash::make($params['cols']['password']),  //có thì thay đổi k có thì thôi
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
    public function saveUpdate($params,){
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
        Session::flash('success','Xóa bản ghi thành công!');
        return $res;
    }
}
