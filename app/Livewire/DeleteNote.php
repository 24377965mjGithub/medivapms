<?php

namespace App\Livewire;

use App\Models\Notes;
use Livewire\Attributes\Title;
use Livewire\Component;

class DeleteNote extends Component
{

    #[Title('Mediva Digital - Delete Project Note')]

    public $noteObj;

    public function mount($noteid)
    {
        $this->noteObj = Notes::where('id', $noteid)->first();
    }

    public function deleteNote() {
        if (Notes::where('id', $this->noteObj->id)->delete()) {
            $this->redirect('/view-project/'.$this->noteObj->projectid, navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.delete-note');
    }
}
