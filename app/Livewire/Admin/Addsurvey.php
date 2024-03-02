<?php

namespace App\Livewire\Admin;
use App\Models\Survey as survey;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Addsurvey extends Component
{
    use Actions;
    use  WithPagination;
    public $add_modal = false;
     public $search, $questions, $code;
     public $collectedValues = [];
     public $result = [];
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.admin.addsurvey',[
            'surv' => survey::where('questions', 'like', $search)->paginate(10),
        ]);
    }

    public function submit(){
        sleep(2);

         $this->validate([
             'questions' => 'required',
             'code' =>'required',

         ]);

      survey::create([
            'questions' => $this->questions,
            'code' => $this->code,

        ]);
        $this->notification()->success(
            $title = 'Question saved!',
            $description = 'Your question was successfully saved'
        );

        $this->add_modal = false;
        $this->reset([
            'questions',
        ]);
    }
}
