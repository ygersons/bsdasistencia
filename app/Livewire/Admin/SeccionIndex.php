<?php

namespace App\Livewire\Admin;

use App\Models\BsdSeccion;
use Livewire\Component;
use Livewire\WithPagination;

class SeccionIndex extends Component
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
        $bsd_seccion = BsdSeccion::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('codigo', 'like', '%' . $this->search . '%');
        })
            ->where('ind_vigencia', 'S')
            ->paginate();

        return view('livewire.admin.seccion-index', compact('bsd_seccion'));
    }
}
