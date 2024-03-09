<div>

    <x-button label="Add Survey Questions" dark icon="plus" wire:click="$set('add_modal', true)" />

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                     </th>
                    <th scope="col" class="px-6 py-3">
                     Questions
                    </th>

                    <th scope="col" class="px-6 py-3">
                       Code
                       </th>


                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-black">
                   @forelse($surv as $q)
                <tr class="border">
                    <td class="px-6 py-4">{{ $q->id }}</td>
                    <td class="px-6 py-4">{{ $q->questions }}</td>
                    <td class="px-6 py-4">{{ $q->code }}</td>


                   <td class="px-6 py-4 flex gap-2 mt-4 justify-center">
                        <x-button class="w-16 h-6" label="edit" icon="pencil-alt"  wire:click="edit({{ $q->id }})" positive />

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
        <x-card title="Update Survey Questions">
            <div class="space-y-3">
                <x-input label="Code" placeholder="" wire:model="code" />
                <x-textarea label="Question" placeholder="" wire:model="questions" />


            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close"  negative/>
                    <x-button positive label="Update" wire:click="submitedit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>

