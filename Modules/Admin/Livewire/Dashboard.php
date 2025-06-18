<?php

namespace Modules\Admin\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data['title'] = 'Dashboard';
        return view('admin::livewire.dashboard', $data)->layout('components.layouts.app', $data);
    }
}
