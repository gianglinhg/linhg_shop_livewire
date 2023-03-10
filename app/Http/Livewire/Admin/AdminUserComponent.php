<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserComponent extends Component
{
    use WithPagination;
    public $editMode = false;

    public $idUser;
    public $user;
    public $roles;
    public $permissions;

    public $role;
    public $permission;

    public $q;
    protected $queryString = ['q'];

    public function showDeleteUser($id){
        $this->idUser = $id;
        $this->dispatchBrowserEvent('delete');
    }
    public function deleteUser(){
        $userDelete = User::find($this->idUser);
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
    public function showFormEdit($id){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->user = User::findOrFail($id);
        if(count($this->user->permissions) > 0){
            foreach($this->user->permissions as $key => $role_permissions){
                $array[$key] =  $role_permissions->name;
            }
            $this->permissions = Permission::whereNot(function ($query) use ($array)   {
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->permissions = Permission::all();
        if(count($this->user->roles) > 0){
            foreach($this->user->roles as $key => $role_roles){
                $array[$key] =  $role_roles->name;
            }
            $this->roles = Role::whereNot(function ($query) use ($array)   {
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->roles = Role::where('name','!=', 'super-admin')->get();
    }
    public function updated(){
        if(!empty($this->role)){
            $this->user->assignRole($this->role);
            session()->flash('msgRole','Đã thêm vai trò');
        }
        if(!empty($this->permission)){
            $this->user->givePermissionTo($this->permission);
            session()->flash('msgPermission','Đã thêm quyền');
        }
    }
    public function revokePermission(User $user, Permission $permission){
        $user->revokePermissionTo($permission);
        session()->flash('message','Đã thu hồi');
        $this->reset();
    }
    public function removeRole(User $user, Role $role){
        $user->removeRole($role);
        session()->flash('message','Đã thu hồi');
        $this->reset();
    }
    public function render()
    {
        $roles = Role::where('name', '!=', 'super-admin')->get();
        $users = User::with('roles','permissions');
            if($this->q)
                $users = $users->where('name','like', '%'.$this->q.'%');
        $users = $users->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super-admin');
        })->paginate(config('admin.paginate'));

        return view('livewire.admin.admin-user-component', compact('users'))
        ->layout('layouts.admin')
        ->layoutData(['title'=>'Thành viên']);
    }
}
