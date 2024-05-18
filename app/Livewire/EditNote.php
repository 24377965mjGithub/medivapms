<?php

namespace App\Livewire;

use App\Models\Notes;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditNote extends Component
{
    #[Title('Mediva Digital - Edit Note')]
    public $noteObj;
    public $note;

    public function mount($noteid) {
        $this->noteObj = Notes::where('id', $noteid)->first();
        $this->note = $this->noteObj->note;
    }

    protected $rules = [
        'note' => 'required'
    ];

    public function updateNote() {
        $this->validate();

        if (Notes::where('id', $this->noteObj->id)->update(['note' => $this->note])) {
            redirect('/view-project/'.$this->noteObj->projectid);
        }
    }

    public function render()
    {
        return view('livewire.edit-note');
    }
}
