<?php

namespace App\Livewire\User;
use App\Models\Survey as survey;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Route;
class Takesurvey extends Component
{
    use Actions;
    use  WithPagination;
    public $add_modal = false;
     public $search, $questions, $code;

     public $model = [];
     public $collectedValues = [];



    public function render()
    {
        $search = '%' . $this->search . '%';
        $surveys = Survey::where('questions', 'like', $search)->paginate(21);

        return view('livewire.user.takesurvey', [
            'surv' => $surveys,
            'collectedValues' => $this->model ?: [],
            'collectedValues' => $this->collectedValues,
        ]);

    }

    public function test()
    {

        $rules = [
            'model' => 'required|array',
        ];

        foreach ($this->model as $key => $value) {
            $rules['model.' . $key] = 'required|integer|between:0,3';
        }

        $this->validate($rules);

        $totals = [
            'S' => 0,
            'A' => 0,
            'D' => 0,
        ];


        foreach ($this->model as $code => $value) {
            $category = substr($code, -1);
            $totals[$category] += intval($value) * 2;
        }

        session(['collectedValues' => $totals]);


        return redirect()->route('result');
    }



    }


