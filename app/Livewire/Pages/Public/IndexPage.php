<?php

namespace App\Livewire\Pages\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPage extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.public.index-page');
    }
}
