<?php

namespace App\Livewire\Admin;

use App\Models\BsdAlumno;
use Livewire\Component;
use Livewire\WithPagination;

class AlumnoIndex extends Component
{

    use WithPagination;
    public $search;
    public $grado;
    public $filtroaula;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingGrado()
    {
        $this->resetPage();
    }

    public function updatingFiltroaula()
    {
        $this->resetPage();
    }

    public function render()
    {
        $grado_alumno = BsdAlumno::query();

        $bsd_alumno = $grado_alumno
            ->when($this->search, function ($grado_alumno) {
                $grado_alumno->where(function ($subgrado) {
                    $subgrado->where('nombres', 'like', '%' . $this->search . '%')
                        ->orWhere('ape_pat', 'like', '%' . $this->search . '%')
                        ->orWhere('ape_mat', 'like', '%' . $this->search . '%')
                        ->orWhereRaw("CONCAT(ape_pat, ' ', ape_mat, ' ', nombres) LIKE ?", ['%'.$this->search.'%'])
                		->orWhere('codigo', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->grado, function ($grado_alumno) {
                if ($this->grado !== '') {
                    $grado_alumno->where('codigo', 'like', $this->grado . '%');
                } else {
                    // Si se selecciona "Todas las Secciones", filtrar según el número de grado_alumno
                    $grado_alumno->where(function ($query) {
                        $query->where('codigo', 'like', '1%')
                            ->orWhere('codigo', 'like', '2%')
                            ->orWhere('codigo', 'like', '3%')
                            ->orWhere('codigo', 'like', '4%')
                            ->orWhere('codigo', 'like', '5%');
                    });
                }
            })
            ->when($this->filtroaula && $this->grado !== '', function ($grado_alumno) {
                // Aplicar el grado del segundo select solo si no se selecciona "Listado Completo"
                $grado_alumno->where('codigo', 'like', '%' . $this->filtroaula . '%');
            })
        	->where('ind_vigencia', 'S')
            ->paginate();

        return view('livewire.admin.alumno-index', compact('bsd_alumno'));
    }
    }

