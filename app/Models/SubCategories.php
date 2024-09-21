<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $table  = 'sub_categories';
    public $timestamps = true;
    public $fillable = ['name','description','category_id_fk'];
}

