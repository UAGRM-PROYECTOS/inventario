<div class="space-y-6">
    
<!--
    <div>
        <x-input-label for="proveedor_id" :value="__('Proveedor Id')"/>
        <x-text-input id="proveedor_id" name="proveedor_id" type="text" class="mt-1 block w-full" :value="old('proveedor_id', $ingreso?->proveedor_id)" autocomplete="proveedor_id" placeholder="Proveedor Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('proveedor_id')"/>
    </div>
    <div>
        <x-input-label for="metodovaluacion_id" :value="__('Metodovaluacion Id')"/>
        <x-text-input id="metodovaluacion_id" name="metodovaluacion_id" type="text" class="mt-1 block w-full" :value="old('metodovaluacion_id', $ingreso?->metodovaluacion_id)" autocomplete="metodovaluacion_id" placeholder="Metodovaluacion Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('metodovaluacion_id')"/>
    </div>
-->
    <div>
        <x-input-label for="fecha_ingreso" :value="__('Fecha Ingreso')"/>
        <x-text-input id="fecha_ingreso" name="fecha_ingreso" type="date" class="mt-1 block w-full" :value="old('fecha_ingreso', $ingreso?->fecha_ingreso)" autocomplete="fecha_ingreso" placeholder="Fecha Ingreso"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_ingreso')"/>
    </div>
    <div>
        <x-input-label for="total" :value="__('Total')"/>
        <x-text-input id="total" name="total" type="text" class="mt-1 block w-full" :value="old('total', $ingreso?->total)" autocomplete="total" placeholder="Total"/>
        <x-input-error class="mt-2" :messages="$errors->get('total')"/>
    </div>
   
    <input type="hidden" name="proveedor_id" id="proveedor_id_hidden" :value="old('proveedor_id', $ingreso ? $ingreso->proveedor_id : '')">

    <!--mod form para add select mode -->
    <select class="block mt-1 w-full rounded-lg" wire:model="proveedor_id" id="proveedor_id" onchange="updateHiddenInput()">
    <option hidden selected>- SELECCIONE -</option>
    @foreach ($proveedores as $proveedor)
        <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
    @endforeach
</select>

<input type="hidden" name="metodovaluacion_id" id="metodovaluacion_id_hidden" :value="old('metodovaluacion_id', $ingreso ? $ingreso->metodovaluacion_id : '')">

    <!--mod form para add select mode -->
    <select class="block mt-1 w-full rounded-lg" wire:model="metodovaluacion_id" id="metodovaluacion_id" onchange="updateHiddenInput()">
    <option hidden selected>- SELECCIONE -</option>
    @foreach ($metodovaluacions as $metodovaluacion)
        <option value="{{$metodovaluacion->id}}">{{$metodovaluacion->nombre}}</option>
    @endforeach
</select>
<script>
    function updateHiddenInput() {
        var selectedProveedoraId = document.getElementById('proveedor_id').value;
        document.getElementById('proveedor_id_hidden').value = selectedProveedoraId;
        
        var selectedMetodovaluacionId = document.getElementById('metodovaluacion_id').value;
        document.getElementById('metodovaluacion_id_hidden').value = selectedMetodovaluacionId;
    }
</script>
<!-- end select-->
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>