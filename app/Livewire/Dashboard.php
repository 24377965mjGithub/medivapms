<?php

namespace App\Livewire;

use App\Models\Deadline;
use App\Models\Projects;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Mediva Digital')]

    public $projects;
    public $user;
    public $search = "";
    public $projectSearchResult;
    public $deadline;

    public function render()
    {
        $this->deadline = Deadline::class;
        $this->projectSearchResult = Projects::where('name', 'like', '%'.$this->search.'%')->get();
        $this->projects = Projects::all();
        $this->user = User::class;
        return view('livewire.dashboard');
    }
}
