<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function home()
    {
        return view('client.home');
    }
    public function contact()
    {
        $title = 'Liên hệ';
        return view('client.contact', compact('title'));
    }
    public function mailContact(Request $request)
    {
        $arr = request()->post();
        $name = trim(strip_tags($arr['name']));
        $email = trim(strip_tags($arr['email']));
        $nd = trim(strip_tags($arr['nd']));
        $adminEmail = 'địachỉAdmin@gmail.com'; //Gửi thư đến ban quản trị
        Mail::mailer('smtp')->to($adminEmail)
            ->send(new GuiEmail($name, $email, $nd));

    }
    public function about()
    {
        $title = 'Giới thiệu';
        return view('client.about', compact('title'));
    }
}