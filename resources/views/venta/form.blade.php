<div class="space-y-6">
    
    <div>
        <x-input-label for="cliente_id" :value="__('Cliente Id')"/>
        <x-text-input id="cliente_id" name="cliente_id" type="text" class="mt-1 block w-full" :value="old('cliente_id', $orden?->cliente_id)" autocomplete="cliente_id" placeholder="Cliente Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('cliente_id')"/>
    </div>
    <div>
        <x-input-label for="total" :value="__('Total')"/>
        <x-text-input id="total" name="total" type="text" class="mt-1 block w-full" :value="old('total', $orden?->total)" autocomplete="total" placeholder="Total"/>
        <x-input-error class="mt-2" :messages="$errors->get('total')"/>
    </div>
    <div>
        <x-input-label for="fecha" :value="__('Fecha')"/>
        <x-text-input id="fecha_orden" name="fecha_orden" type="date" class="mt-1 block w-full" :value="old('fecha', $orden?->fecha)" autocomplete="fecha" placeholder="Fecha"/>
        
        <x-input-label id="fecha" name="fecha" type="text" class="mt-1 block w-full" :value="old('fecha', $orden?->fecha)" autocomplete="fecha" placeholder="Fecha"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha')"/>
    </div>

    <input type="hidden" name="estado_id" id="estado_id_hidden" :value="old('estado_id', $orden ? $orden->estado_id : '')">

    <!--mod form para add select mode -->
    <select class="block mt-1 w-full rounded-lg" wire:model="estado_id" id="estado_id" onchange="updateHiddenInput()">
    <option hidden selected>- SELECCIONE -</option>
    @foreach ($estados as $estado)
        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
    @endforeach
</select>
<script>
    function updateHiddenInput() {
        var selectedEstadoId = document.getElementById('estado_id').value;
        document.getElementById('estado_id_hidden').value = selectedEstadoId;
        
    }
</script>
<!-- end select-->
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>