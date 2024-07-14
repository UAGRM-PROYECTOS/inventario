<div class="space-y-6">
    
    <div>
        <x-input-label for="metodovaluacion_id" :value="__('Metodovaluacion Id')"/>
        <x-text-input id="metodovaluacion_id" name="metodovaluacion_id" type="text" class="mt-1 block w-full" :value="old('metodovaluacion_id', $salida?->metodovaluacion_id)" autocomplete="metodovaluacion_id" placeholder="Metodovaluacion Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('metodovaluacion_id')"/>
    </div>
    <div>
        <x-input-label for="orden_id" :value="__('Orden Id')"/>
        <x-text-input id="orden_id" name="orden_id" type="text" class="mt-1 block w-full" :value="old('orden_id', $salida?->orden_id)" autocomplete="orden_id" placeholder="Orden Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('orden_id')"/>
    </div>
    <div>
        <x-input-label for="estado_id" :value="__('Estado Id')"/>
        <x-text-input id="estado_id" name="estado_id" type="text" class="mt-1 block w-full" :value="old('estado_id', $salida?->estado_id)" autocomplete="estado_id" placeholder="Estado Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('estado_id')"/>
    </div>
    <div>
        <x-input-label for="fecha_salida" :value="__('Fecha Salida')"/>
        <x-text-input id="fecha_salida" name="fecha_salida" type="text" class="mt-1 block w-full" :value="old('fecha_salida', $salida?->fecha_salida)" autocomplete="fecha_salida" placeholder="Fecha Salida"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_salida')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>