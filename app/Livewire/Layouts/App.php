<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class App extends Component
{
    public $isSidebarOpen = true;

    public function toggleSidebar()
    {
        $this->isSidebarOpen = !$this->isSidebarOpen;
    }

    public function render()
    {
        return view('livewire.layouts.app');
    }
}