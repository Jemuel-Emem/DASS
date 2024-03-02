<?php

namespace App\Livewire\Admin;
use App\Models\Result as res;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\Component;

class Results extends Component
{
    use Actions;
    use  WithPagination;
    public $search, $interpretation, $editid;
    public $edit_modal = false;
    public function render()
    {
        $search = '%' .$this->search. '%';
        return view('livewire.admin.results',[
            'surv' => res::where('id', 'like', $search)->paginate(10),
        ]);
    }

    public function edit($id){
        $data = res::where('id', $id)->first();

        if ($data){
           $this->interpretation = $data->interpretation;
           $this->editid = $data->id;
           $this->edit_modal = true;
        }
           }

           public function submitedit(){
            $data = res::where('id', $this->editid)->first();

            $data->update([
                'interpretation' => $this->interpretation,

            ]);

            $this->notification()->success(
                $title = 'Intrepretation Update!',
                $description = 'Your interpretation was updated successfully'
            );

            $this->edit_modal = false;


        }

}
