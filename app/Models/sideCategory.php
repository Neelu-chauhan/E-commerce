<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sideCategory extends Model
{
    use HasFactory;
    protected $table ='side_categories';
    protected $fillable = ['name','status','description'];


    public function getPermissionData() {
        return $this->hasMany(permission::class,'category','id');
    }
}
