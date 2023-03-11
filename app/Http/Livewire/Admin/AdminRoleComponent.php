<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoleComponent extends Component
{
    use WithPagination;
    public $editMode = false;
    public $name;
    public $role_permission;
    public $permissions;
    public $role;

    protected $rules = [
        'name' => 'required | min:3'
    ];

    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }

    public function storeRoleAdd(){
        // $this->validate();
        Role::create([
            'name' => $this->name
        ]);
        session()->flash('message','Tạo vai trò thành công');
        $this->dispatchBrowserEvent('message');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }

    public function showFormEdit($id){
        $this->reset();
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->role = Role::findOrFail($id);
        $this->name = $this->role->name;
        if(count($this->role->permissions) > 0){
            foreach($this->role->permissions as $key => $role_permissions){
                $array[$key] =  $role_permissions->name;
            }
            $this->permissions = Permission::whereNot(function ($query) use ($array)   {
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->permissions = Permission::all();
    }

    public function revokePermission(Role $role, Permission $permission){
        $role->revokePermissionTo($permission);
        session()->flash('message','Đã thu hồi');
    }
    public function storeRoleEdit(){
        if(!empty($this->role_permission)){
            $this->role->givePermissionTo($this->role_permission);
            session()->flash('msgSpatie','Đã thêm');
        }
        $this->role->update([
            'name' => $this->name
        ]);
        session()->flash('message','Sửa vai trò thành công');
        $this->dispatchBrowserEvent('message');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }

    public function showDeleteRole(Role $role){
        $role->delete();
        session()->flash('message','Xóa vai trò thành công');
        $this->dispatchBrowserEvent('message');
        $this->reset();
    }

    public function render()
    {
        $roles = Role::whereNotIn('name', ['super-admin'])->paginate(config('admin.paginate'));
        return view('livewire.admin.admin-role-component',compact('roles'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => 'Tài khoản',
            'title'=>'Vai trò người dùng'
        ]);
    }
}