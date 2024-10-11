<div class="container">
    <x-loading-indicator />
    @include('livewire.comercio.form')
    <x-confirmation-alert />

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
                            <th colspan="2" class="small text-bold text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ubicaciones as $ubicacion)
                            <tr>
                                <td class="text-sm">{{ $ubicacion->razon_social }}</td>
                                <td class="text-sm">{{ $ubicacion->direccion }}</td>
                                <td class="text-sm">{{ $ubicacion->rubro }}</td>
                                <td class="small text-center">
                                    <a href="" wire:click.prevent="editaComercio({{ $ubicacion }})">
                                        <i class="fa fa-edit mr-3 text-info" data-toggle="tooltip" data-placement="top"
                                            title="Editar ubicacion"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-comment-dollar text-danger" data-toggle="tooltip"
                                            data-placement="top" title="Cobrar Cliente"></i>
                                    </a>
                                </td>
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
    <script>
        console.log('Modal');
        document.addEventListener('open-modal', event => {
            $('#form').modal('show'); // Abre el modal con el ID 'form'
        });
        document.addEventListener('livewire:load', function() {
                $('#razon_social').trigger('focus').select();
                console.log("Iniciando...");
            });
            // console.log($("#razon_social").val());
            // console.log(document.getElementById("razon_social").value);

        </script>

</div>
