<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email|exists:users',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.exists' => 'Email address not recognised in our record'
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('/dashboard');
        }

        $this->addError('password', 'Invalid password.');
    }


    public function render()
    {
        return view('livewire.login');
    }

    public function layout()
    {
        return null;
    }
}
