<?php

namespace App\Livewire\Admin;

use App\Models\BsdGrado;
use Livewire\Component;
use Livewire\WithPagination;

class GradoIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bsd_grado = BsdGrado::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('codigo', 'like', '%' . $this->search . '%');
        })
            ->where('ind_vigencia', 'S')
            ->paginate();

        return view('livewire.admin.grado-index', compact('bsd_grado'));
    }
}
