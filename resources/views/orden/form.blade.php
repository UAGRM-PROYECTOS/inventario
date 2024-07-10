<div class="space-y-6">
    
    <div>
        <x-input-label for="cliente_id" :value="__('Cliente Id')"/>
        <x-text-input id="cliente_id" name="cliente_id" type="text" class="mt-1 block w-full" :value="old('cliente_id', $orden?->cliente_id)" autocomplete="cliente_id" placeholder="Cliente Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('cliente_id')"/>
    </div>
    <div>
        <x-input-label for="estado_id" :value="__('Estado Id')"/>
        <x-text-input id="estado_id" name="estado_id" type="text" class="mt-1 block w-full" :value="old('estado_id', $orden?->estado_id)" autocomplete="estado_id" placeholder="Estado Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('estado_id')"/>
    </div>
    <div>
        <x-input-label for="total" :value="__('Total')"/>
        <x-text-input id="total" name="total" type="text" class="mt-1 block w-full" :value="old('total', $orden?->total)" autocomplete="total" placeholder="Total"/>
        <x-input-error class="mt-2" :messages="$errors->get('total')"/>
    </div>
    <div>
        <x-input-label for="fecha" :value="__('Fecha')"/>
        <x-text-input id="fecha" name="fecha" type="text" class="mt-1 block w-full" :value="old('fecha', $orden?->fecha)" autocomplete="fecha" placeholder="Fecha"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>