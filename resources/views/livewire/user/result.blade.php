<div class="w-full mt-5 ">
    <x-card class="mt-10 mb-10 ml-10 mr-10">
        <div class=" flex justify-center">
            <img src="{{ asset('images/stats.png') }}" alt="Violation Photo" class="w-16 h-16">
        </div>
        <div class="mt-20">
            <div class="flex gap-4">
                @if($collectedValues)
                    <h2 class="text-2xl">Scale Result</h2>
                   <div class="text-2xl">
                    @foreach ($collectedValues as $category => $total)
                  {{ $total }} <span>-</span>
                @endforeach
                   </div>
            </div>

            <div class="flex flex-col text-2xl">
                @foreach ($collectedValues as $category => $total)
                    @php
                        $severity = '';
                        $updatedCategory = '';
                        if ($category === 'D') {
                            if ($total >= 0 && $total <= 9) {
                                $severity = 'Normal';
                            } elseif ($total >= 10 && $total <= 13) {
                                $severity = 'Mild';
                            } elseif ($total >= 14 && $total <= 20) {
                                $severity = 'Moderate';
                            } elseif ($total >= 21 && $total <= 27) {
                                $severity = 'Severe';
                            } elseif ($total >= 28) {
                                $severity = 'Extremely Severe';
                            }
                            $updatedCategory = 'Depression';
                        } elseif ($category === 'A') {
                            if ($total >= 0 && $total <= 7) {
                                $severity = 'Normal';
                            } elseif ($total >= 8 && $total <= 9) {
                                $severity = 'Mild';
                            } elseif ($total >= 10 && $total <= 14) {
                                $severity = 'Moderate';
                            } elseif ($total >= 15 && $total <= 19) {
                                $severity = 'Severe';
                            } elseif ($total >= 20) {
                                $severity = 'Extremely Severe';
                            }
                            $updatedCategory = 'Anxiety';
                        } elseif ($category === 'S') {
                            if ($total >= 0 && $total <= 14) {
                                $severity = 'Normal';
                            } elseif ($total >= 15 && $total <= 18) {
                                $severity = 'Mild';
                            } elseif ($total >= 19 && $total <= 25) {
                                $severity = 'Moderate';
                            } elseif ($total >= 26 && $total <= 33) {
                                $severity = 'Severe';
                            } elseif ($total >= 34) {
                                $severity = 'Extremely Severe';
                            }
                            $updatedCategory = 'Stress';
                        }
                    @endphp
                    <div>
                        @if ($severity)
                            {{ $updatedCategory }}: {{ $severity }}
                        @else
                            {{ $category }}: {{ $total }}
                        @endif
                    </div>
                @endforeach
            </div>

        @endif
    </div>

    <div class="text-center mt-4 flex gap-4">
        <x-button wire:click="save" class="bg-red-400 text-white w-32 hover:bg-red-300"> Retake</x-button>
        <x-button wire:click="submit" class="bg-green-400 text-white w-32 hover:bg-green-300"> Submit Result</x-button>
    </div>
</x-card>
</div>

