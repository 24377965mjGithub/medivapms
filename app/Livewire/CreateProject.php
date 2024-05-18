<?php

namespace App\Livewire;

use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateProject extends Component
{
    #[Title('Mediva Digital - Create Project')]

    public $name;
    public $description;

    public $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function createProject() {
        $this->validate();

        if (Projects::create(['userid' => Auth::user()->id, 'name' => $this->name, 'description' => $this->description])) {
            $this->dispatch('projectcreated');
            $this->name = "";
            $this->description = "";
        }
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
