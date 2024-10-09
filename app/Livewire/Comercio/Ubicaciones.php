<?php

namespace App\Livewire\Comercio;

use App\Livewire\Admin\AdminComponent;
use App\Models\Ubicacion;

class Ubicaciones extends AdminComponent
{
    public $searchTerm = '';

    public $hola = null;

    public $ubicaciones = [];

    public $count = 2;
    public $variable = Null;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

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
    public function render()
    {
        return view('livewire.comercio.ubicaciones',[
            'ubicaciones' => $this->ubicaciones])->layout('admin.layouts.app');

    }
}
