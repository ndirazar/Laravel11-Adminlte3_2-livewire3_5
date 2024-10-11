<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateCliente' : 'createCliente' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($showEditModal)
                            <span>Editar Cliente</span>
                        @else
                            <span>Nueva Cliente</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Apellido y Nombre</label>
                        <input type="text" wire:model.defer="state.nombre"
                            class="form-control form-control-sm text-capitalize @error('nombre') is-invalid @enderror"
                            id="nombre" aria-describedby="nombre" placeholder="Apellido y Nombre">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" wire:model.defer="state.direccion"
                            class="form-control form-control-sm text-capitalize @error('direccion') is-invalid @enderror"
                            id="direccion" aria-describedby="direccion" placeholder="Direccion">
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Celular</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend input-group-prepend-sm">
                                <span class="input-group-text input-group-text-sm"><i
                                        class="fas fa-phone"></i></span>
                            </div>
                            <input type="number" class="form-control form-conrol-sm" wire:model="state.telefono"
                                id="telefono" placeholder="Celular">
                            @error('telefono') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Correo Electronico</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend input-group-prepend-sm">
                                <span class="input-group-text input-group-text-sm"><i
                                        class="fas fa-at"></i></span>
                            </div>
                            <input type="email" class="form-control form-conrol-sm" wire:model="state.email"
                                id="email" placeholder="Email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="limite">Límite de Crédito</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control text-right"
                                    wire:model.defer="state.limite_credito"
                                    aria-label="Amount (to the nearest dollar)">
                                @error('limite_credito') <span
                                    class="text-danger">{{ $message }}</span>@enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="saldo">Saldo Cta.Cte</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control text-right" wire:model.defer="state.saldo"
                                    readonly>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cerrar</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save mr-1"></i>
                        @if ($showEditModal)
                            <span>Guardar Cambios</span>
                        @else
                            <span>Grabar</span>
                        @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
