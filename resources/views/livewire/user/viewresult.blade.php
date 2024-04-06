<div class="w-8/12 p-12">
    <label for="" class="text-cyan-500 text-2xl font-black">RECOMMENDATION RESULT</label>

    @foreach ($interpretation as $inter)
    <div class="bg-white shadow-md rounded-lg p-8 mt-4">


        <div class="flex justify-between mt-2">
            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Stress:</span>
                @php
                    $stress = $inter->stress;
                    $severity = '';
                    if ($stress >= 0 && $stress <= 14) {
                        $severity = 'Normal';
                    } elseif ($stress >= 15 && $stress <= 18) {
                        $severity = 'Mild';
                    } elseif ($stress >= 19 && $stress <= 25) {
                        $severity = 'Moderate';
                    } elseif ($stress >= 26 && $stress <= 33) {
                        $severity = 'Severe';
                    } elseif ($stress >= 34) {
                        $severity = 'Extremely Severe';
                    }
                @endphp
                <span class="text-gray-600">{{ $severity }}</span>
            </div>

            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Anxiety:</span>
                @php
                    $anxiety = $inter->anxiety;
                    $severity = '';
                    if ($anxiety >= 0 && $anxiety <= 7) {
                        $severity = 'Normal';
                    } elseif ($anxiety >= 8 && $anxiety <= 9) {
                        $severity = 'Mild';
                    } elseif ($anxiety >= 10 && $anxiety <= 14) {
                        $severity = 'Moderate';
                    } elseif ($anxiety >= 15 && $anxiety <= 19) {
                        $severity = 'Severe';
                    } elseif ($anxiety >= 20) {
                        $severity = 'Extremely Severe';
                    }
                @endphp
                <span class="text-gray-600">{{ $severity }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Depression:</span>
                @php
                    $depression = $inter->depression;
                    $severity = '';
                    if ($depression >= 0 && $depression <= 7) {
                        $severity = 'Normal';
                    } elseif ($depression >= 8 && $depression <= 9) {
                        $severity = 'Mild';
                    } elseif ($depression >= 10 && $depression <= 14) {
                        $severity = 'Moderate';
                    } elseif ($depression >= 15 && $depression <= 19) {
                        $severity = 'Severe';
                    } elseif ($depression >= 20) {
                        $severity = 'Extremely Severe';
                    }
                @endphp
                <span class="text-gray-600">{{ $severity }}</span>
            </div>



        </div>

        <div class="flex flex-col text-end mt-4">
            <span class="text-gray-800">Recommendation:</span>
            @if ($inter->interpretation == "No response yet")
                <span class="text-red-500">{{ $inter->interpretation }}</span>

                @else
                <span class="text-green-500">{{ $inter->interpretation }}</span>

            @endif


        </div>
    </div>
    @endforeach
</div>
