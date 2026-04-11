<?php

namespace App\Livewire\Pages\Owner\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewUser extends Component
{


    public $user;
    public $role;

  

    #[Computed()]
    //get all users with their roles
    public function users()
    {
        return User::query()
            ->where('tenant_id', Auth::user()->tenant_id)
            // ->where('id', '!=', Auth::id())  //e  hide  ya  ang iya self
            ->with('roles:id,name')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
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

    #[Layout('components.layouts.owner')]

    public function render()
    {
        return view('livewire.pages.owner.user.view-user');
    }
}
