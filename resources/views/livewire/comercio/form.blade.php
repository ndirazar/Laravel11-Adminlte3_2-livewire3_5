<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateCliente' : 'createCliente' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($showEditModal)
                            <span>Editar Comercio</span>
                        @else
                            <span>Nueva Comercio</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Razon Social --}}
                    <div class="form-group">
                        <label for="nombre">Razon Social</label>
                        <input type="text" wire:model.defer="state.razon_social"
                            class="form-control form-control-sm text-capitalize @error('nombre') is-invalid @enderror"
                            id="razon_social" aria-describedby="razon_social" placeholder="Razon Social">
                        @error('razon_social')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Direccion --}}
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
                    {{-- rubro --}}
                    <div class="form-group">
                        <label for="rubro">Rubro</label>
                        <input type="text" wire:model.defer="state.rubro"
                            class="form-control form-control-sm text-capitalize @error('rubro') is-invalid @enderror"
                            id="rubro" aria-describedby="rubro" placeholder="Rubro">
                        @error('rubro')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Telefono --}}
                    {{-- <div class="form-group">
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

                    </div> --}}
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
