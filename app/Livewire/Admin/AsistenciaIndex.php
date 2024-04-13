<?php

namespace App\Livewire\Admin;

use App\Models\BsdAsistencia;
use Livewire\Component;
use Livewire\WithPagination;

class AsistenciaIndex extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_asistencia =BsdAsistencia:: where('nombreA', 'like','%' . $this->search. '%')
        ->orWhere('dniA', 'like','%' . $this->search. '%')
        ->paginate();
        return view('livewire.admin.asistencia-index',compact('bsd_asistencia'));
    }

 
}
