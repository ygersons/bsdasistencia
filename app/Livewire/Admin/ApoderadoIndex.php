<?php

namespace App\Livewire\Admin;

use App\Models\BsdApoderado;
use App\Models\BsdAlumno;
use Livewire\Component;
use Livewire\WithPagination;

class ApoderadoIndex extends Component
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
        $query = BsdApoderado::query()

            ->where(function ($q) {
                $q->where('nombres', 'like', '%' . $this->search . '%')
                    ->orWhere('nom_completo', 'like', '%' . $this->search . '%')
                    ->orWhere('nro_doc_iden', 'like', '%' . $this->search . '%');
            })->where('ind_vigencia', 'S');

        $searchTerms = explode(' ', $this->search);
        foreach ($searchTerms as $term) {
            $query->orWhereHas('alumno', function ($q) use ($term) {
                $q->where(function ($q) use ($term) {
                    $q->where('codigo', 'like', '%' . $term . '%')
                    ->orWhere('nom_completo', 'like', '%' . $this->search . '%');
                });
            })->where('ind_vigencia', 'S');
        }


        $bsd_apoderado = $query->paginate();

        return view('livewire.admin.apoderado-index', compact('bsd_apoderado'));
    }
}
