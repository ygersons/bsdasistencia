<?php

namespace App\Livewire\Admin;

use App\Models\BsdJustificacion;

use Livewire\Component;
use Livewire\WithPagination;

class JustificacionIndex extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $bsd_justificacion = BsdJustificacion:: where('dni', 'like','%' . $this->search. '%')
        ->paginate();
        return view('livewire.admin.justificacion-index',compact('bsd_justificacion'));
    }
}