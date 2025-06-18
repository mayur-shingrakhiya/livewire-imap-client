<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class BaseComponent extends Component
{
    #[On('clear-error')]
    public function clearError($field)
    {
        $this->resetErrorBag($field);
    }
}
