<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignPermission extends Model
{
    use HasFactory;
    protected $table ='assign_permissions';
    protected $fillable = ['role_id_fk','permission_id','status'];
}
