<?php

namespace App\Livewire\Pages\Employee\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewUserEmployee extends Component
{
    public $user;
    public $role;

  

    #[Computed()]
    //get all users with their roles
    public function users()
    {
        $user = Auth::user();
        $user = Auth::user();

    return User::query()
        ->when($user->hasRole('employee'), function ($query) use ($user) {
         
            $query->where('id', $user->id);
        })
        ->when($user->hasRole('owner'), function ($query) use ($user) {
        
            $query->where('tenant_id', $user->tenant_id)
                ->where('id', '!=', $user->id)
                ->whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'Admin');
                });
        })
        ->with('roles:id,name')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function delete($id)
    {
        $user = User::where('id', $id)
            ->where('tenant_id', Auth::user()->tenant_id)
            ->firstOrFail();
        $user->delete();
    }

    public function edit($id)
    {
        return redirect()->route('owner.edit.user', ['id' => $id]);
    }



    #[Layout('components.layouts.employee')]
    public function render()
    {
        return view('livewire.pages.employee.user.view-user-employee');
    }
}
