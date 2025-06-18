<?php

namespace Modules\Admin\Livewire;

use Livewire\Component;
use Modules\Admin\Models\Admin;

class Admins extends Component
{
    public function render()
    {
        $data['title'] = 'Admin Page';
        return view('admin::livewire.admins', $data)->layout('admin::components.layouts.app', $data);
    }
}
