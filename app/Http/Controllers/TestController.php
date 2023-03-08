<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class TestController extends Controller
{
    public function test(Request $request){
        //Cách 1
        // $query1 = \App\Models\Product::with()->get();
        // $color1 = $query1[0]->productDetails[0]->color;

        //Cách 2
        $query2 = \App\Models\Product::findOrFail(36);
        $color2 =  $query2->productDetails[0]->color;
        // dd($color2);
        return $query2;
    }
}
