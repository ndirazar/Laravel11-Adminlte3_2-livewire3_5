<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comercios Georreferenciados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Comercios Geo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
        </div>
    </div>
</section>
