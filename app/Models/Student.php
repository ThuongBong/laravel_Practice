<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'age',
        'address',
        'phone',
        'created_at',
        'updated_at'
    ];

    //search sẽ xử lí việc lọc, nếu phải lọc nhiều cái
    public function scopeSearchName($query, $search=''){  //name giá trị mặc định ban đầu
        if ($search != null && $search != ''){
            return $query-> where("name","like",'%'.$search."%");
        }
        return $query;
    }
}
