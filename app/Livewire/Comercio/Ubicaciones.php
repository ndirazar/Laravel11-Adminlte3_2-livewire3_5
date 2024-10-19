<?php

namespace App\Livewire\Comercio;

use App\Livewire\Admin\AdminComponent;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class Ubicaciones extends AdminComponent
{
    public $searchTerm = '';

    public $state = [];

    public $ubicaciones = [];

    public $ubicacion = null;

    public $showEditModal = false;

    public $count = 2;

    public $variable = Null;

    public function mount()
    {
        // dd('mount');
        $this->ubicaciones = Ubicacion::orderBy('razon_social', 'asc')->get();
    }

    public function updatedsearchTerm()
    {

        $this->ubicaciones = Ubicacion::where('razon_social', 'like', '%' . $this->searchTerm . '%')
                                      ->orderBy('razon_social', 'asc')
                                      ->get();

        
    }

    public function editaComercio(Ubicacion $ubicacion)
    {
        $this->showEditModal = true;

        $this->ubicacion = $ubicacion;

        $this->state = $ubicacion->toArray();

        // dd($this->state);

        $this->dispatch('show-form');
    }

    public function render()
    {

        return view('livewire.comercio.ubicaciones',[
            'ubicaciones' => $this->ubicaciones])->layout('admin.layouts.app');

    }

    public function updateComercio()
    {
        $validatedData = Validator::make($this->state, [
            'razon_social' => 'required',
            'direccion' => 'required',
            'rubro' => 'required',
            // 'direccion' => 'required',
            // 'limite_credito' => 'required',
            // 'saldo' => 'required',
        ])->validate();

        $validatedData['razon_social'] = Str::title($validatedData['razon_social']);
        $validatedData['direccion'] = Str::title($validatedData['direccion']);
        $validatedData['rubro'] = Str::title($validatedData['rubro']);

        $this->ubicacion->update($validatedData);

        $this->ubicaciones = Ubicacion::where('razon_social', 'like', '%' . $this->searchTerm . '%')
                                      ->orderBy('razon_social', 'asc')
                                      ->get();

        $this->dispatch('hide-form', ['message' => 'Cliente actualizado con Exito!']);
    }
}
