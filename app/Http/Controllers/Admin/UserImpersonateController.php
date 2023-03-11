<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserImpersonateController extends Controller
{
    public function impersonate($id){
        $user = \App\Models\User::findOrFail($id);
        Auth::user()->impersonate($user);
        return redirect()->route('admin.dashboard');
    }
    public function impersonate_leave(){
        Auth::user()->leaveImpersonation();
        return redirect()->route('admin.user');
    }
}
