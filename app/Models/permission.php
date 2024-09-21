<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $table ='permissionss';
    protected $fillable = ['name','description','category'];

    public function getcategory(){
        return $this->belongsTo(sideCategory::class,'category','id');
    }
}
