<?php

namespace App\Livewire;

use App\Models\Projects;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditProject extends Component
{
    #[Title('Mediva Digital - Edit Project')]
    public $projectObj;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required')]
    public $description;

    public function mount($projectid) {
        $this->projectObj = Projects::where('id', $projectid)->first();
        $this->name = $this->projectObj->name;
        $this->description = $this->projectObj->description;
    }

    public function updateProject() {
        $this->validate();

        if (Projects::where('id', $this->projectObj->id)->update(['name' => $this->name, 'description' => $this->description])) {
            $this->redirect('/view-project/'.$this->projectObj->id, navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.edit-project');
    }
}
