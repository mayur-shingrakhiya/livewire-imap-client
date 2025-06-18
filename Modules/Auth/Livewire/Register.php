<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Models\Admin;

class Register extends BaseComponent
{

    public $fullname, $email, $password;

    public function submit()
    {
        $this->validate([
            'fullname' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@#$%&]).{8,}$/|min:8',
        ]);
        Admin::create(['name' => $this->fullname, 'email' => $this->email, 'password' => Hash::make($this->password)]);

        return redirect()->route('admin.sign.in')
            ->with('success', 'Your account has been registered successfully.');
    }
    public function render()
    {
        $data['title'] = 'Sign Up';
        return view('auth::livewire.register')->layout('auth::components.layouts.app', $data);
    }
}
