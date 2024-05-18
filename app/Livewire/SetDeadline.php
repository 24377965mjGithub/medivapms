<?php

namespace App\Livewire;

use App\Models\Deadline;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class SetDeadline extends Component
{
    #[Title('Mediva Digital - Set Project Deadline')]
    public $projectObj;
    public $date;
    public $time;


    public function mount($projectid) {
        $this->projectObj = Projects::where('id', $projectid)->first();
    }

    public $rules = [
        'date' => 'required',
        'time' => 'required'
    ];

    public function setDeadline() {
        if (Deadline::where('projectid', $this->projectObj->id)->count() == 0) {
            if (Deadline::create(['projectid' => $this->projectObj->id, 'userid' => Auth::user()->id, 'deadline' => $this->date." ".$this->time])) {
                $this->redirect('/view-project/'.$this->projectObj->id, navigate: true);
            }
        } else {
            if (Deadline::where('projectid', $this->projectObj->id)->update(['userid' => Auth::user()->id, 'deadline' => $this->date." ".$this->time])) {
                $this->redirect('/view-project/'.$this->projectObj->id, navigate: true);
            }
        }
    }

    public function render()
    {
        return view('livewire.set-deadline');
    }
}
