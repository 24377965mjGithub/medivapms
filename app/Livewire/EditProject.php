<?php

namespace App\Livewire;

use App\Models\Projects;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditProject extends Component
{
    #[Title('Mediva Digital - Edit Project')]
    public $projectObj;
    public $name;
    public $description;

    public $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function mount($projectid) {
        $this->projectObj = Projects::where('id', $projectid)->first();
        $this->name = $this->projectObj->name;
        $this->description = $this->projectObj->description;
    }

    public function updateProject() {
        $this->validate();

        if (Projects::where('id', $this->projectObj->id)->update(['name' => $this->name, 'description' => $this->description])) {
            redirect('/view-project/'.$this->projectObj->id);
        }
    }

    public function render()
    {
        return view('livewire.edit-project');
    }
}
