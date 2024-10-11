<?php

namespace App\Livewire\Comercio;

use App\Livewire\Admin\AdminComponent;
use App\Models\Ubicacion;

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

        $this->dispatch('open-modal');
    }

    public function render()
    {
        return view('livewire.comercio.ubicaciones',[
            'ubicaciones' => $this->ubicaciones])->layout('admin.layouts.app');

    }
}
