<div>
    <td class="border px-4 py-2 text-center">
        <div wire:click="$set('open',true)" class="cursor-pointer">
            <i class="fas fa-edit bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-full flex items-center justify-center" ></i>
        </div>
    </td>
    {{ $open }}
    <x-jet-dialog-modal wire:model="open" >
        <x-slot name="title" class="font-bold">
            Editar
        </x-slot>

        <x-slot name="content">
            
        </x-slot>
        <x-slot name="footer">
            

        </x-slot>


    </x-jet-dialog-modal>
</div>
