<?php

namespace App\Livewire;

use App\Models\Deadline;
use App\Models\Notes;
use App\Models\Projects;
use App\Models\Status;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeleteProject extends Component
{

    #[Title('Mediva Digital - Delete Project')]
    public $projectObj;

    public function mount($projectid) {
        $this->projectObj = Projects::where('id', $projectid)->first();
    }

    public function deleteProject() {
        if (Projects::where('id', $this->projectObj->id)->delete()) {
            Deadline::where('projectid', $this->projectObj->id)->delete();
            Notes::where('projectid', $this->projectObj->id)->delete();
            Status::where('projectid', $this->projectObj->id)->delete();
            redirect('/dashboard');
        }
    }

    public function render()
    {
        return view('livewire.delete-project');
    }
}
