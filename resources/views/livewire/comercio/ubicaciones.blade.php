<div>
    <div class="card">
        {{-- <div class="card-header bg-gradient-info">
            <h5 class="text-white font-weight-bolder ">Habilitaciones Comerciales</h5>
        </div> --}}
        <x-search-input wire:model.live="searchTerm" />
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-sm">Razón Social</th>
                        <th class="text-sm">Dirección</th>
                        <th class="text-sm">Rubro</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ubicaciones as $ubicacion)
                        <tr>
                            <td class="text-sm">{{ $ubicacion->razon_social }}</td>
                            <td class="text-sm">{{ $ubicacion->direccion }}</td>
                            <td class="text-sm">{{ $ubicacion->rubro }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($ubicaciones->isEmpty())
                <p>No se encontraron resultados.</p>
            @endif
        </div>
    </div>
    <script>
        console.log('Ubicacioens');
    </script>
</div>
