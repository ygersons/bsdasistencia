<?php

namespace App\Livewire\Admin;

use App\Models\BsdApoderado;
use Livewire\Component;
use Livewire\WithPagination;

class CargaApoderadoIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bsd_apoderado = BsdApoderado::where(function ($query) {
            $query->where('nombres', 'like', '%' . $this->search . '%')
            ->orWhere('ape_pat', 'like', '%' . $this->search . '%')
            ->orWhere('ape_mat', 'like', '%' . $this->search . '%')
            ->orWhere('nro_doc_iden', 'like', '%' . $this->search . '%')
            ->orWhere('dni_alumno', 'like', '%' . $this->search . '%');
        })
            ->where('ind_vigencia', 'S')
            ->paginate();

        return view('livewire.admin.carga-apoderado-index',compact('bsd_apoderado'));
    }
}
