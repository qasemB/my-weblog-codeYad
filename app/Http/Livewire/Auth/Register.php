<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $data = [
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
        "policy" => false
    ];

    public function handleRegister()
    {

        $this->validate([
            'data.email' => 'required |email | unique:users,email',
            'data.password' => 'required |string | min:6 | confirmed',
            'data.policy' => 'required',
        ]);

        $user = new User;
        $user->email = $this->data['email'];
        $user->password = Hash::make($this->data['password']);
        $user->gender = 1;
        $user->is_admin = 0;
        $user->role = 'user';
        $user->news = 1;
        $user->save();

        $id = $user->id;

        Auth::loginUsingId($id);

        return redirect()->to('/');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
