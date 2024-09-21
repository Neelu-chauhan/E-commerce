<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['category_id_fk', 'subcat_id_fk', 'name', 'sku', 'buying_price', 'selling_price', 'brand', 'tax', 'status', 'purchasable', 'stock_out', 'refundable', 'max_quantity', 'min_quantity', 'unit', 'weight'];

     public function category_name(){
        return $this->belongsTo(Category::class,'category_id_fk','id');
    }
    
}
