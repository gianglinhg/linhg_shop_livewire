<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        //N-1, khóa ngoại Imgae nối khóa chính
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
