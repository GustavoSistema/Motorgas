<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Taller
    </button>
    {{ $open }}
    <x-jet-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Taller</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre:" />
                <x-jet-input wire:model="nombre" type="text" class="w-full" />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Direccion:" />
                <x-jet-input wire:model="direccion" type="text" class="w-full" />
                <x-jet-input-error for="direccion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Representante:" />
                <x-jet-input wire:model="representante" type="text" class="w-full" />
                <x-jet-input-error for="representante" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Distrito:" />
                <x-jet-input wire:model="idDistrito" type="text" class="w-full" />
                <x-jet-input-error for="idDistrito" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Logo:" />
                <x-jet-input wire:model="rutaLogo" type="file" class="w-full" id="{{$borralogo}}" />
                <x-jet-input-error for="rutaLogo" />
            </div>

            <div class="mb-4" style="max-height: 5cm; overflow: hidden;">
                @if ($rutaLogo)
                    <img src="{{ $rutaLogo->temporaryUrl() }}" alt="Logo Seleccionada" class="max-w-full h-auto" />
                @endif
            </div>

            <div class="mb-4">
                <x-jet-label value="Firma:" />
                <x-jet-input wire:model="rutaFirma" type="file" class="w-full" id="{{$borrafirma}}" />
                <x-jet-input-error for="rutaFirma" />
            </div>

            <div class="mb-4" style="max-height: 5cm; overflow: hidden;">
                @if ($rutaFirma)
                    <img src="{{ $rutaFirma->temporaryUrl() }}" alt="Firma Seleccionada" class="max-w-full h-auto" />
                @endif
            </div>

            <div class="mb-4">
                <x-jet-label value="RUC:" />
                <x-jet-input wire:model="ruc" type="text" class="w-full" />
                <x-jet-input-error for="ruc" />
            </div>
        </x-slot>


        <x-slot name="footer">
            <x-jet-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="crearTaller" wire:loading.attr="disabled" wire:target="crearTaller"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
