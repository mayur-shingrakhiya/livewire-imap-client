<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Auth;

class Login extends BaseComponent
{
    public $email, $password;



    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);
        if (Auth::guard('admins')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()
            ->with('error', 'Oops! It looks like the email or password you provided is incorrect. Please try again.');
    }

    public function render()
    {
        $data['title'] = 'Sign In';

        return view('auth::livewire.login', $data)->layout('auth::components.layouts.app', $data);
    }
}
