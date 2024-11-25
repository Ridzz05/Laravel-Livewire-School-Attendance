<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public User $user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        $this->user->name = $validated['name'];
        $this->user->email = $validated['email'];
        
        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        session()->flash('message', 'User berhasil diupdate!');
        return $this->redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.users.edit')
            ->layout('livewire.layouts.app');
    }
}