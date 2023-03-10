<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUser2Component extends Component
{
    use WithPagination;

    public $user_id;
    public $user;
    public $isPermission = false;
    // public $roles;
    // public $permissions;

    public $role = [];
    public $permission = [];

    public $q;
    protected $queryString = ['q'];

    public function showDeleteUser($id){
        $this->user_id = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deleteUser(){
        $userDelete = User::find($this->user_id);
        if($userDelete->hasRole('super-admin')){
            session()->flash('message','Không thể xóa supper-admin');
        }else {
            $userDelete->delete();
            session()->flash('message','Đã hủy vai trò');
        }
        $this->dispatchBrowserEvent('hide-delete');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }
    public function showPermission($id){
        $this->reset();
        $this->isPermission = true;
        $this->dispatchBrowserEvent('show-form');
        $this->user = User::findOrFail($id);
    }
    public function storePermission(){
        dd($this->user);
        $this->user->syncRoles($this->role);
        $this->user->syncPermissions($this->permission);
        $this->dispatchBrowserEvent('hide-form');
        // $this->user = null;
        $this->reset();
    }
    public function render()
    {
        $users = User::with('roles','permissions');
            if($this->q)
                $users = $users->where('name','like', '%'.$this->q.'%');
        $users = $users->latest()->paginate(config('admin.paginate'));
        $roles = Role::whereNotIn('name', ['super-admin'])->get();
        $permissions = Permission::all();
        return view('livewire.admin.admin-user2-component', compact('users','roles','permissions'))
        ->layout('layouts.admin')
        ->layoutData(['title'=>'Thành viên']);
    }
}
