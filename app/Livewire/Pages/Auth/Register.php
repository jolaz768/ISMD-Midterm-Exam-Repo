<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';


  
    public function rule()
    {
        return [
            'name' => 'required|min:2|max:60',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 60 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password does not match',
        ];
    }

    public function register()
    {        
        $this->validate($this->rule(), $this->messages());
        
        $this->password = bcrypt($this->password);
        $this->name = ucwords($this->name);
        $this->email = strtolower($this->email);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $user->tenant_id = $user->id;
        
        $user->save();

        $user->assignRole('owner');

        Auth::login($user);

        if ($user->hasRole('owner')) {
            return redirect()->route('owner.dashboard');
        } elseif ($user->hasRole('employee')) {
            return redirect()->route('employee.dashboard');
        } else {
            return redirect()->route('login.page');
        }
        
    }
    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
