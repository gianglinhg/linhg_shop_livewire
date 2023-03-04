<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Auth;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Dashboard',
            'title'=> Auth::user()->name
        ]);
    }
}
