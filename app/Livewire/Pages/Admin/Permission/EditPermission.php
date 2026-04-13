<?php

namespace App\Livewire\Pages\Admin\Permission;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{   
            public $name;
    public $permission;
    public $guard_name = 'web';

    public function rules(){
        return [
            'name' => 'required|string|min:3|unique:permissions,name',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'The permission name is required.',
            'name.unique' => 'The permission name must be unique/already taken.',
        ];
    }

    public function save()
    {

        $this->validate();

        $this->name = Str::of($this->name)->trim()->title()->lower();

        $this->Permission::update([
            'name' => $this->name,
            
        ]);
        session()->flash('success', 'Permission created successfully.');
        return redirect()->route('admin.view.permission')->with('success', 'Permission created successfully.');
       
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.permission.edit-permission');
    }
}
