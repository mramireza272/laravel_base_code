<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class UserSearchBar extends Component
{
	public $query;
	public $users;

	public function mount()
	{
		$this->query = "";
		$this->users = [];
	}

	public function updatedQuery()
	{
		
		$this->users = User::where('name', 'ilike', '%'. $request->search .'%')
							->get()->toArray();
	}
    public function render()
    {
        return view('livewire.user-search-bar');
    }
}
