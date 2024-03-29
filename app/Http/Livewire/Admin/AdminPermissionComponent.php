<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminPermissionComponent extends Component
{
    use WithPagination;
    public $editMode = false;
    public $name;
    public $permission;
    public $roless;
    public $permission_role;

    protected $rules = ['name' => 'required | min:3'];

    public function showFormAdd(){
        $this->reset();
        $this->dispatchBrowserEvent('show-form');
    }
    public function storePermissionAdd(){
        $this->validate();
        Permission::create([
            'name' => $this->name
        ]);
        session()->flash('message','Tạo quyền thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showFormEdit(Permission $permission){
        $this->editMode = true;
        $this->dispatchBrowserEvent('show-form');
        $this->permission = $permission;
        $this->name = $permission->name;
        if(count($this->permission->roles) > 0){
            foreach($this->permission->roles as $key => $permission->role){
                $array[$key] =  $permission->role->name;
            }
            $this->roless = Role::whereNot(function ($query) use ($array)   {
                $query->where('name','super-admin');
                for ($i=0; $i < count($array) ; $i++) {
                    $query->orWhere('name', $array[$i]);
                }
            })
            ->get();
        }else $this->roless = Role::whereNotIn('name', ['super-admin'])->get();
    }
    public function removeRole(Permission $permission, Role $role){
        $permission->removeRole($role);
    }
    public function storePermissionEdit(){
        if(!empty($this->permission_role)){
            $this->permission->assignRole($this->permission_role);
        }
        $this->validate();
        $this->permission->update([
            'name' => $this->name
        ]);
        session()->flash('message','Sửa quyền thành công');
        $this->dispatchBrowserEvent('hide-form');
        $this->reset();
    }
    public function showDeletePermission(Permission $permission){
        $permission->delete();
        session()->flash('message','Xóa quyền thành công');
        $this->reset();
    }
    public function render()
    {
        $permissions = Permission::orderBy('name','asc')->paginate(config('admin.paginate'));
        $subtitle = new AdminPermissionComponent();
        $subtitle->path = route('admin.user');
        $subtitle->name = 'Tài khoản';
        return view('livewire.admin.admin-permission-component',compact('permissions'))
        ->layout('layouts.admin')
        ->layoutData([
            'subtitle' => $subtitle,
            'title'=>'Quyền người dùng'
        ]);
    }
}