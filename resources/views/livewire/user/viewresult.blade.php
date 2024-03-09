<div class="w-8/12 p-12">
    <label for="" class="text-cyan-500 text-2xl font-black">RECOMMENDATION RESULT</label>

    @foreach ($interpretation as $inter)
    <div class="bg-white shadow-md rounded-lg p-8 mt-4">


        <div class="flex justify-between mt-2">
            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Stress:</span>
                <span class="text-gray-600">{{ $inter->stress }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Anxiety:</span>
                <span class="text-gray-600">{{ $inter->anxiety }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-800 font-bold">Depression:</span>
                <span class="text-gray-600">{{ $inter->depression }}</span>
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
