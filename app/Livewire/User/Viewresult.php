<?php

namespace App\Livewire\User;
use App\Models\Result as res;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Viewresult extends Component
{
    public $search;
    public $result, $userId;
    public function render()
    {


        $search = '%' . $this->search . '%';
        return view('livewire.user.viewresult', [
            'interpretation' => res::where('userid', Auth::id())
                             ->where('id', 'like', $search)
                             ->paginate(10),
        ]);
    }


}
