<div class="space-y-6">
    
    <div>
        <x-input-label for="cod_barra" :value="__('Cod Barra')"/>
        <x-text-input id="cod_barra" name="cod_barra" type="text" class="mt-1 block w-full" :value="old('cod_barra', $producto?->cod_barra)" autocomplete="cod_barra" placeholder="Cod Barra"/>
        <x-input-error class="mt-2" :messages="$errors->get('cod_barra')"/>
    </div>
    <div>
        <x-input-label for="nombre" :value="__('Nombre')"/>
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $producto?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" :messages="$errors->get('nombre')"/>
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion')"/>
        <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" :value="old('descripcion', $producto?->descripcion)" autocomplete="descripcion" placeholder="Descripcion"/>
        <x-input-error class="mt-2" :messages="$errors->get('descripcion')"/>
    </div>
    <div>
        <x-input-label for="precio" :value="__('Precio')"/>
        <x-text-input id="precio" name="precio" type="text" class="mt-1 block w-full" :value="old('precio', $producto?->precio)" autocomplete="precio" placeholder="Por default 00.00"/>
        <x-input-error class="mt-2" :messages="$errors->get('precio')"/>
    </div>
    <!-- 
    <div>
        <x-input-label for="costo_promedio" :value="__('Costo Promedio')"/>
        <x-text-input id="costo_promedio" name="costo_promedio" type="text" class="mt-1 block w-full" :value="old('costo_promedio', $producto?->costo_promedio)" autocomplete="costo_promedio" placeholder="Por default 00.00"/>
        <x-input-error class="mt-2" :messages="$errors->get('costo_promedio')"/>
    </div>
    <div>
        <x-input-label for="stock" :value="__('Stock')"/>
        <x-text-input id="stock" name="stock" type="text" class="mt-1 block w-full" :value="old('stock', $producto?->stock)" autocomplete="stock" placeholder="Por default 0"/>
        <x-input-error class="mt-2" :messages="$errors->get('stock')"/>
    </div>
    <div>
        <x-input-label for="stock_min" :value="__('Stock Min')"/>
        <x-text-input id="stock_min" name="stock_min" type="text" class="mt-1 block w-full" :value="old('stock_min', $producto?->stock_min)" autocomplete="stock_min" placeholder="Por default 5"/>
        <x-input-error class="mt-2" :messages="$errors->get('stock_min')"/>
    </div>
   <div>
        <x-input-label for="categoria_id" :value="__('Categoria Id')"/>
        <x-text-input id="categoria_id" name="categoria_id" type="text" class="mt-1 block w-full" :value="old('categoria_id', $producto?->categoria_id)" autocomplete="categoria_id" placeholder="Categoria Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('categoria_id')"/>
    </div>
    -->
    <input type="hidden" name="categoria_id" id="categoria_id_hidden" :value="old('categoria_id', $producto ? $producto->categoria_id : '')">
    <input type="hidden" name="unidad" id="unidad_hidden" :value="old('unidad', $producto ? $producto->unidad : '')">

    <!--mod form para add select mode -->
    <div>
    <x-input-label for="precio" :value="__('Unidad')"/>
    <select class="block mt-1 w-full rounded-lg" wire:model="unidad" id="unidad" onchange="updateHiddenInput()">
    <option hidden selected>- SELECCIONE -</option>
    @foreach ($unidades as $unidad)
        <option value="{{ $unidad }}">{{ $unidad }}</option>
    @endforeach
</select>
<x-input-error class="mt-2" :messages="$errors->get('precio')"/>
</div>
<div>
<x-input-label for="precio" :value="__('Categoria')"/>
    <select class="block mt-1 w-full rounded-lg" wire:model="categoria_id" id="categoria_id" onchange="updateHiddenInput()">
    <option hidden selected>- SELECCIONE -</option>
    @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
    @endforeach
    </select>
<x-input-error class="mt-2" :messages="$errors->get('precio')"/>
</div>
<script>
    function updateHiddenInput() {
        var selectedCategoriaId = document.getElementById('categoria_id').value;
        document.getElementById('categoria_id_hidden').value = selectedCategoriaId;

        var selectedUnidad = document.getElementById('unidad').value;
        document.getElementById('unidad_hidden').value = selectedUnidad;
    }
</script>
<!-- end select-->

            <div class="mt-5">
                <x-input-label for="foto" value="{{ __('Foto del producto') }}" />
                <x-text-input id="imagen" name="imagen" type="file" accept="image/*" class="mt-1 block w-full" />
            </div>


    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>