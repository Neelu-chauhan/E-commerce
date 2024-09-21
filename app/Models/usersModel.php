<?php

namespace App\Models;

use App\Models\country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class usersModel extends Model
{
    use HasFactory;
    protected $table ='users';
    protected $fillable = ['name','email','phone','password'];

    public function getCountry(){
        return $this->belongsTo(country::class,'country_id','id');
    }
    public function getrole(){
        return $this->belongsTo(Roles::class,'role_id_fk','id');
    }
    public function getperm(){
        return $this->belongsTo(permission::class,'permission_id_fk','id');
    }
}