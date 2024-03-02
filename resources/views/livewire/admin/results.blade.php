<div>


    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                     </th>
                    <th scope="col" class="px-6 py-3">
                   Stress
                    </th>

                    <th scope="col" class="px-6 py-3">
                   Anxitey
                       </th>
                  <th scope="col" class="px-6 py-3">
                       Depression
                   </th>
                   <th scope="col" class="px-6 py-3">
                   Test Result
                </th>

                   <th scope="col" class="px-6 py-3">
                    Interpretation
                </th>


                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-black">
                   @forelse($surv as $q)
                <tr class="border">
                    <td class="px-6 py-4">{{ $q->userid }}</td>
                    <td class="px-6 py-4">{{ $q->stress }}</td>
                    <td class="px-6 py-4">{{ $q->anxiety }}</td>
                    <td class="px-6 py-4">{{ $q->depression }}</td>
                    <td class="px-6 py-4">{{ $q->result }}</td>
                    <td class="px-6 py-4">{{ $q->interpretation }}</td>
                   <td class="px-6 py-4 flex gap-2 mt-4 justify-center">
                        <x-button class="w-22 h-6 " label="interpret" icon="pencil-alt"  wire:click="edit({{ $q->id }})" positive />
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="10">No data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>
          {{ $surv->links() }}
        </div>
    </div>



    <x-modal wire:model.defer="add_modal">
        <x-card title="Add Questionaire">
            <div class="space-y-3">
                <x-input label="Code" placeholder="" wire:model="code" />
                <x-textarea label="Question" placeholder="" wire:model="questions" />


            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close"  negative/>
                    <x-button positive label="Submit" wire:click="submit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>


    <x-modal wire:model.defer="edit_modal">
        <x-card title="Update Interpretation">
            <div class="space-y-3">

                <x-textarea label="Interpretation" placeholder="" wire:model="interpretation" />


            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close"  negative/>
                    <x-button positive label="Submit" wire:click="submitedit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>

