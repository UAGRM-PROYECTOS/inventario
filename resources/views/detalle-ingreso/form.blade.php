<div class="space-y-6">
    <!-- Input oculto para guardar el ID del producto seleccionado -->
    <input type="hidden" name="producto_id" id="producto_id_hidden" :value="old('producto_id', $detalleIngreso ? $detalleIngreso->producto_id : '')">

    <!-- Select para seleccionar el producto -->
    <x-input-label for="producto_id" :value="__('Producto')"/>
    <select class="block mt-1 w-full rounded-lg" id="producto_id" onchange="updateHiddenInput()">
        <option hidden selected>- SELECCIONE -</option>
        @foreach ($productos as $producto)
            <option value="{{$producto->id}}" data-nombre="{{$producto->nombre}}" data-precio="{{$producto->precio}}">{{$producto->nombre}}</option>
        @endforeach
    </select>

    <script>
        function updateHiddenInput() {
            var selectedProductoId = document.getElementById('producto_id').value;
            document.getElementById('producto_id_hidden').value = selectedProductoId;

            // Obtener nombre y precio del producto seleccionado y actualizar los campos correspondientes
            var selectedOption = document.getElementById('producto_id').options[document.getElementById('producto_id').selectedIndex];
            var nombreProducto = selectedOption.getAttribute('data-nombre');
            var precioProducto = selectedOption.getAttribute('data-precio');

            document.getElementById('nombre_producto').innerText = nombreProducto;
            document.getElementById('costo_unitario').value = precioProducto;
            calcularCostoTotal();
        }

        function calcularCostoTotal() {
            var cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            var costoUnitario = parseFloat(document.getElementById('costo_unitario').value) || 0;
            var costoTotal = cantidad * costoUnitario;
            document.getElementById('costo_total').value = costoTotal.toFixed(2);
        }
    </script>

    <!-- Mostrar nombre del producto seleccionado -->
    <div>
        <x-input-label for="nombre_producto" :value="__('Nombre del Producto')"/>
        <span id="nombre_producto"></span>
    </div>

    <!-- Input para ingresar el ID del ingreso -->
    <div>
        <x-input-label for="ingreso_id" :value="__('Ingreso Id')"/>
        <x-text-input id="ingreso_id" name="ingreso_id" type="text" class="mt-1 block w-full" :value="old('ingreso_id', $detalleIngreso ? $detalleIngreso->ingreso_id : '')" autocomplete="ingreso_id" placeholder="Ingreso Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('ingreso_id')"/>
    </div>

    <!-- Input para ingresar la cantidad -->
    <div>
        <x-input-label for="cantidad" :value="__('Cantidad')"/>
        <x-text-input id="cantidad" name="cantidad" type="text" class="mt-1 block w-full" :value="old('cantidad', $detalleIngreso ? $detalleIngreso->cantidad : '')" autocomplete="cantidad" placeholder="Cantidad" oninput="calcularCostoTotal()"/>
        <x-input-error class="mt-2" :messages="$errors->get('cantidad')"/>
    </div>

    <!-- Input para ingresar el costo unitario -->
    <div>
        <x-input-label for="costo_unitario" :value="__('Costo Unitario')"/>
        <x-text-input id="costo_unitario" name="costo_unitario" type="text" class="mt-1 block w-full" :value="old('costo_unitario', $detalleIngreso ? $detalleIngreso->costo_unitario : '')" autocomplete="costo_unitario" placeholder="Costo Unitario"/>
        <x-input-error class="mt-2" :messages="$errors->get('costo_unitario')"/>
    </div>

    <!-- Input para mostrar el costo total -->
    <div>
        <x-input-label for="costo_total" :value="__('Costo Total')"/>
        <x-text-input id="costo_total" name="costo_total" type="text" class="mt-1 block w-full" :value="old('costo_total', $detalleIngreso ? $detalleIngreso->costo_total : '')" autocomplete="costo_total" placeholder="Costo Total" readonly/>
        <x-input-error class="mt-2" :messages="$errors->get('costo_total')"/>
    </div>

    <!-- Botón para enviar el formulario -->
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
