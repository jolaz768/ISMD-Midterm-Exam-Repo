<?php

use App\Livewire\Pages\Admin\AdminDashboard;
use App\Livewire\Pages\Admin\Role\CreateRole;
use App\Livewire\Pages\Admin\Role\EditRole;
use App\Livewire\Pages\Admin\Role\ViewRole;
use App\Livewire\Pages\Admin\User\CreateUser;
use App\Livewire\Pages\Admin\User\EditUser;
use App\Livewire\Pages\Admin\User\ViewUser;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Owner\OwnerDashboard;
use App\Livewire\Pages\Owner\User\CreateUser as CreateUserOwner;
use App\Livewire\Pages\Owner\User\EditUser as EditUserOwner;
use App\Livewire\Pages\Owner\User\ViewUser as ViewUserOwner;
use App\Livewire\Pages\Public\IndexPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexPage::class)->name('home.page');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login.page');
    Route::get('/register', Register::class)->name('register.page');
});

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login.page');
})->name('logout')->middleware('auth');

Route::prefix('admin')
->middleware(['auth', 'role:admin'])
->group(function()
{
    Route::get('/dashboard',AdminDashboard::class)->name('admin.dashboard');

    Route::get('/create-role',CreateRole::class)->name('admin.create.role');
    Route::get('/view-role',ViewRole::class)->name('admin.view.role');
    Route::get('/edit-role/{id}',EditRole::class)->name('admin.edit.role');

    Route::get('/create-user',CreateUser::class)->name('admin.create.user');
    Route::get('/view-user',ViewUser::class)->name('admin.view.user');
    Route::get('/edit-user/{id}',EditUser::class)->name('admin.edit.user');

  
});

Route::prefix('owner')
->middleware(['auth', 'role:owner'])
->group(function()
{
    Route::get('/dashboard',OwnerDashboard::class)->name('owner.dashboard');


    Route::get('/create-user',CreateUserOwner::class)->name('owner.create.user');
    Route::get('/view-user',ViewUserOwner::class)->name('owner.view.user');
    Route::get('/edit-user/{id}',EditUserOwner::class)->name('owner.edit.user');
  
});