<?php

namespace App\Livewire\Admin;

use App\Models\BsdAlumno;
use Livewire\Component;
use Livewire\WithPagination;
class CargaAlumnoIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $bsd_alumno =BsdAlumno:: where('nombres', 'like','%' . $this->search. '%')
        ->orWhere('ape_pat', 'like','%' . $this->search. '%')
        ->orWhere('ape_mat', 'like','%' . $this->search. '%')
        ->paginate();
        return view('livewire.admin.carga-alumno-index', compact('bsd_alumno'));
    }
}

