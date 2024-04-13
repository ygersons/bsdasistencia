<?php

namespace App\Livewire\Admin;

use App\Models\BsdHorario;
use Livewire\Component;
use Livewire\WithPagination;

class HorarioIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;


    public function render()
    {
        $bsd_horario = BsdHorario:: where('nombre', 'like','%' . $this->search. '%')
        ->orWhere('descripcion', 'like','%' . $this->search. '%')
        ->paginate();
        return view('livewire.admin.horario-index', compact('bsd_horario'));
    }
}
