<?php

namespace App\Livewire\Pages\Employee;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EmpDashboard extends Component
{
    #[Layout('components.layouts.employee')]
    public function render()
    {
        return view('livewire.pages.employee.emp-dashboard');
    }
}
