

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div>
                <div class="space-y-6">
                    <div>
                        <x-input-label for="tcRazonSocial" :value="__('Razon Social')"/>
                        <x-text-input id="tcRazonSocial" name="tcRazonSocial" type="text" class="mt-1 block w-full" :value="old('tcRazonSocial', $cliente->name)" placeholder="Nombre del Usuario"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tcRazonSocial')"/>
                    </div>
                    <div>
                        <x-input-label for="tcCiNit" :value="__('CI/NIT')"/>
                        <x-text-input id="tcCiNit" name="tcCiNit" type="text" class="mt-1 block w-full" :value="old('tcCiNit', 0)" placeholder="Número de CI/NIT"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tcCiNit')"/>
                    </div>
                    <div>
                        <x-input-label for="tnTelefono" :value="__('Celular')"/>
                        <x-text-input id="tnTelefono" name="tnTelefono" type="text" class="mt-1 block w-full" :value="old('tnTelefono', 69490587)" placeholder="Número de Teléfono"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tnTelefono')"/>
                    </div>
                    <div>
                        <x-input-label for="tcCorreo" :value="__('Correo')"/>
                        <x-text-input id="tcCorreo" name="tcCorreo" type="text" class="mt-1 block w-full" :value="old('tcCorreo', $cliente->email)" placeholder="Correo Electrónico"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tcCorreo')"/>
                    </div>
                    <div>
                        <x-input-label for="tnMonto" :value="__('Monto Total')"/>
                        <x-text-input id="tnMonto" name="tnMonto" type="text" class="mt-1 block w-full" :value="old('tnMonto', $orden->total)" placeholder="Costo Total"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tnMonto')"/>
                    </div>
                    <div>
                        <x-input-label for="tnTipoServicio" :value="__('Tipo de Servicio')"/>
                        <select id="tnTipoServicio" name="tnTipoServicio" class="form-control mt-1 block w-full">
                            <option value="1">Servicio QR</option>
                            <option value="2">Tigo Money</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('tnTipoServicio')"/>
                    </div>

                    <h5 class="text-center mt-4">Datos del Producto</h5>
                    @foreach($detalleOrdens as $index => $detalle)
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label for="serial-{{ $index }}" :value="__('Serial')"/>
                                <x-text-input id="serial-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Serial]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Serial', $detalle->producto->cod_barra)" placeholder="Serial"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Serial')"/>
                            </div>
                            <div>
                                <x-input-label for="producto-{{ $index }}" :value="__('Producto')"/>
                                <x-text-input id="producto-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Producto]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Producto', $detalle->producto->nombre)" placeholder="Producto"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Producto')"/>
                            </div>
                            <div>
                                <x-input-label for="cantidad-{{ $index }}" :value="__('Cantidad')"/>
                                <x-text-input id="cantidad-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Cantidad]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Cantidad', $detalle->cantidad)" placeholder="Cantidad"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Cantidad')"/>
                            </div>
                            <div>
                                <x-input-label for="precio-{{ $index }}" :value="__('Precio')"/>
                                <x-text-input id="precio-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Precio]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Precio', $detalle->precio_unitario)" placeholder="Precio"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Precio')"/>
                            </div>
                            <div>
                                <x-input-label for="descuento-{{ $index }}" :value="__('Descuento')"/>
                                <x-text-input id="descuento-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Descuento]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Descuento', $detalle->descuento)" placeholder="Descuento"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Descuento')"/>
                            </div>
                            <div>
                                <x-input-label for="total-{{ $index }}" :value="__('Total')"/>
                                <x-text-input id="total-{{ $index }}" name="taPedidoDetalle[{{ $index }}][Total]" type="text" class="mt-1 block w-full" :value="old('taPedidoDetalle.' . $index . '.Total', $detalle->precio_total)" placeholder="Total"/>
                                <x-input-error class="mt-2" :messages="$errors->get('taPedidoDetalle.' . $index . '.Total')"/>
                            </div>
                        </div>
                    @endforeach
                        

                    <div class="flex items-center gap-4">
                        <x-primary-button>
                            Consumir
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="flex justify-center items-center">
                <iframe name="QrImage" class="w-full h-full border"></iframe>
            </div>
        </div>
    </form>
</div>
