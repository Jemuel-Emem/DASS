<?php

namespace App\Livewire\User;

use App\Models\Result as Res;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Livewire\Component;

class Result extends Component
{
    public $collectedValues;
    use Actions;
    use  WithPagination;
    public function mount()
    {
        $this->collectedValues = session('collectedValues');
    }

    public function render()
    {
        return view('livewire.user.result');
    }

    public function submit()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the result?',
            'icon'        => 'success',
            'accept'      => [
                'label'  => 'Yes, save it',
                'method' => 'save',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function cancel()
    {
        return redirect()->back();
    }

    public function save()
    {
        $categoryResults = [];
        foreach ($this->collectedValues as $category => $value) {
            $severity = $this->getSeverity($category, $value);
            $categoryResults[$category] = [
                'scale' => $value,
                'severity' => $severity,
            ];
        }

        Res::create([
            'userid' => Auth::id(),
            'stress' => $this->collectedValues['S'] ?? 0,
            'anxiety' => $this->collectedValues['A'] ?? 0,
            'depression' => $this->collectedValues['D'] ?? 0,
            'result' => json_encode($categoryResults),
            'interpretation' => "No response yet",
        ]);

        $this->notification()->send([
            'title'       => 'Result Submitted!',
            'description' => 'Your result has been submitted ',
            'icon'        => 'success',
        ]);

        return redirect()->route('userdashboard');
    }

    private function getSeverity($category, $value)
    {
        if ($category === 'S') {
            if ($value >= 0 && $value <= 14) {
                return 'Normal';
            } elseif ($value >= 15 && $value <= 18) {
                return 'Mild';
            } elseif ($value >= 19 && $value <= 25) {
                return 'Moderate';
            } elseif ($value >= 26 && $value <= 33) {
                return 'Severe';
            } elseif ($value >= 34) {
                return 'Extremely Severe';
            }
        } elseif ($category === 'A') {
            if ($value >= 0 && $value <= 7) {
                return 'Normal';
            } elseif ($value >= 8 && $value <= 9) {
                return 'Mild';
            } elseif ($value >= 10 && $value <= 14) {
                return 'Moderate';
            } elseif ($value >= 15 && $value <= 19) {
                return 'Severe';
            } elseif ($value >= 20) {
                return 'Extremely Severe';
            }
        } elseif ($category === 'D') {
            if ($value >= 0 && $value <= 9) {
                return 'Normal';
            } elseif ($value >= 10 && $value <= 13) {
                return 'Mild';
            } elseif ($value >= 14 && $value <= 20) {
                return 'Moderate';
            } elseif ($value >= 21 && $value <= 27) {
                return 'Severe';
            } elseif ($value >= 28) {
                return 'Extremely Severe';
            }
        }

    }
}
