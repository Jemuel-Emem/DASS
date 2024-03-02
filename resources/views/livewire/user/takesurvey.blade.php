<div class="mt-10  flex">
    <x-card class="bg-white text-black rounded-lg" >
      <div class="text-gray-500">
        Please read each statement and select a number, 0, 1, 2, or 3 which indicates how the statement applied to you over the past week. There are no right or wrong answers. Do not spend too much time on any statement.

        <div class="flex flex-col">
            <span>The rating scale is as follows</span>
            <ul>
                <li>0 Did not apply to all</li>
                <li>1 Applied to me to some degree, or some of the time </li>
                <li>2 Applied to me to a considerable degree or a good part of time</li>
                <li>3 Applied to me very much or most of the time</li>

            </ul>

          </div>
          <span class="text-red-500">* Take note - All fields must be fillup before proceeding </span>
          @error('model.*')
          <div class="text-red-500">{{ $message }}</div>
      @enderror
    </div>


        <hr class="mt-2">
        @forelse($surv as $q)
            <div class="flex justify-between items-center mt-4 ">
                <div class="flex items-center">
                    <span class="font-bold mr-2">{{ $q->id }}.</span>
                    <span class="mr-2">({{ $q->code }})</span>
                    <span>{{ $q->questions }}</span>
                </div>
                <div class="w-5/12">
                    <x-native-select class="w-12/12"
                        label="Select Scale"
                        placeholder="Select"
                        :options="['0', '1', '2', '3']"
                        wire:model="model.{{ $q->id }}{{ $q->code }}"
                        required

                    />
                </div>

            </div>
        @empty
        @endforelse

        <div class="result">
            @if($collectedValues)
                <h2>Collected Values</h2>
                <ul>
                    @foreach ($collectedValues as $code => $value)
                        <li>Code: {{ $code }}</li>
                        <ul>
                            <li>Value: {{ $value }}</li>
                        </ul>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="text-center mt-10">
            <button class="bg-green-500 hover:bg-green-600 rounded h-12 text-white w-full" wire:click="test">Test</button>
        </div>
    </x-card>
</div>
