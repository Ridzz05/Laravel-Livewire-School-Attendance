<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        
        if ($user) {
            $user->delete();
            session()->flash('message', 'Berhasil menghapus user!');
        }
    }

    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->paginate($this->perPage);

        return view('livewire.users.index', [
            'users' => $users
        ])->layout('livewire.layouts.app');
    }
}