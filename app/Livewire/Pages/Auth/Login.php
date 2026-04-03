<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
     public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(route('admin.dashboard'));
            }elseif(Auth::user()->hasAnyRole(['owner'])){ {
                return redirect()->intended(route('owner.dashboard'));
            }}elseif(Auth::user()->hasRole('staff')){ {
                return redirect()->intended(route('owner.dashboard'));
            }}else{
                return redirect()->intended(route('login.page'));
            }
                
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }
    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
