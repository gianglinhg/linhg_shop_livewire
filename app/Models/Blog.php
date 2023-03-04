<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $dateFormat = 'd-m-Y';

    public function blogComments(){
        return $this->hasMany(BlogComment::class);
    }
    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class);
    }
}
