
<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Servicio
    </button>
    {{$open}}
    <x-jet-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Rol</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">  
            <x-jet-label value="Placa:" />
            <x-jet-input wire:model="placa" type="text" class="w-full" />
            <x-jet-input-error for="placa" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Serie:" />
            <x-jet-input wire:model="serie" type="text" class="w-full" />
            <x-jet-input-error for="serie" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Certificador:" />
            <x-jet-input wire:model="certificador" type="text" class="w-full" />
            <x-jet-input-error for="certificador" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Taller:" />
            <x-jet-input wire:model="taller" type="text" class="w-full" />
            <x-jet-input-error for="taller" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Precio:" />
            <x-jet-input wire:model="precio" type="number" step="0.01" class="w-full" />
            <x-jet-input-error for="precio" />
            </div>
            
            <div class="mb-4">
            <x-jet-label value="Fecha:" />
            <x-jet-input wire:model="fecha" type="date" class="w-full" />
            <x-jet-input-error for="fecha" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Externo:" />
            <x-jet-input wire:model="externo" type="checkbox" class="w-full" />
            <x-jet-input-error for="externo" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Tipo de Servicio:" />
            <x-jet-input wire:model="tipoServicio" type="text" class="w-full" />
            <x-jet-input-error for="tipoServicio" />
            </div>

            <div class="mb-4">
            <x-jet-label value="Estado:" />
            <x-jet-input wire:model="estado" type="text" class="w-full" />
            <x-jet-input-error for="estado" />
            </div>
            
            <div class="mb-4">
            <x-jet-label value="Pagado:" />
            <x-jet-input wire:model="pagado" type="checkbox" class="w-full" />
            <x-jet-input-error for="pagado" />
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)" class="mx-2">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="crearRol" wire:loading.attr="disabled" wire:target="crearRol" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-jet-button>

        </x-slot>

    </x-jet-dialog-modal>   
</div>
