<div class="space-y-6">
    
    <div>
        <x-input-label for="orden_id" :value="__('Orden Id')"/>
        <x-text-input id="orden_id" name="orden_id" type="text" class="mt-1 block w-full" :value="old('orden_id', $pago?->orden_id)" autocomplete="orden_id" placeholder="Orden Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('orden_id')"/>
    </div>
    <div>
        <x-input-label for="metodopagos_id" :value="__('Metodopagos Id')"/>
        <x-text-input id="metodopagos_id" name="metodopagos_id" type="text" class="mt-1 block w-full" :value="old('metodopagos_id', $pago?->metodopagos_id)" autocomplete="metodopagos_id" placeholder="Metodopagos Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('metodopagos_id')"/>
    </div>
    <div>
        <x-input-label for="estado_id" :value="__('Estado Id')"/>
        <x-text-input id="estado_id" name="estado_id" type="text" class="mt-1 block w-full" :value="old('estado_id', $pago?->estado_id)" autocomplete="estado_id" placeholder="Estado Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('estado_id')"/>
    </div>
    <div>
        <x-input-label for="nombre" :value="__('Nombre')"/>
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $pago?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" :messages="$errors->get('nombre')"/>
    </div>
    <div>
        <x-input-label for="monto_pago" :value="__('Monto Pago')"/>
        <x-text-input id="monto_pago" name="monto_pago" type="text" class="mt-1 block w-full" :value="old('monto_pago', $pago?->monto_pago)" autocomplete="monto_pago" placeholder="Monto Pago"/>
        <x-input-error class="mt-2" :messages="$errors->get('monto_pago')"/>
    </div>
    <div>
        <x-input-label for="fecha_pago" :value="__('Fecha Pago')"/>
        <x-text-input id="fecha_pago" name="fecha_pago" type="text" class="mt-1 block w-full" :value="old('fecha_pago', $pago?->fecha_pago)" autocomplete="fecha_pago" placeholder="Fecha Pago"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_pago')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>