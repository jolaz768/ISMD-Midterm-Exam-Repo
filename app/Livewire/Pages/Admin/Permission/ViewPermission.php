<?php

namespace App\Livewire\Pages\Admin\Permission;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class ViewPermission extends Component
{   
    
    public $permissions =[];

  
    public function mount()
{
    $this->permissions = Permission::select('id', 'name', 'created_at')->get();
}
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.permission.view-permission');
    }
}
