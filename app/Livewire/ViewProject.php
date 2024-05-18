<?php

namespace App\Livewire;

use App\Models\Deadline;
use App\Models\Notes;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class ViewProject extends Component
{
    #[Title('Mediva Digital - View Project')]

    public $project;
    public $note;
    public $allNotes;
    public $user;
    public $deadline;

    public function mount($projectid)
    {
        $this->project = Projects::where('id', $projectid)->first();
    }

    public $rules = [
        'note' => 'required'
    ];

    public function addNote() {
        $this->validate();
        if (Notes::create(['projectid' => $this->project->id, 'userid' => Auth::user()->id, 'note' => $this->note])) {
            $this->dispatch('notecreated');
            $this->note = "";
        }
    }

    public function render()
    {
        $this->user = User::class;
        $this->deadline = Deadline::class;
        $this->allNotes = Notes::where('projectid', $this->project->id)->orderBy('id', 'desc')->get();
        return view('livewire.view-project');
    }
}
