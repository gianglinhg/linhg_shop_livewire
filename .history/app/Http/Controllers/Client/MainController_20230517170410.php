<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function home(){
        return view('client.home');
    }
    public function contact(){
        $title = 'Liên hệ';
        return view('client.contact', compact('title'));
    }
    public function mailContact(Request $request){
        
    }
    public function about(){
        $title = 'Giới thiệu';
        return view('client.about', compact('title'));
    }
}
