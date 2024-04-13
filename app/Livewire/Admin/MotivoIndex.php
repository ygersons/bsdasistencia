<?php

namespace App\Livewire\Admin;

use App\Models\BsdMotivo;
use Livewire\Component;
use Livewire\WithPagination;

class MotivoIndex extends Component
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
        $bsd_motivo = BsdMotivo::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');

        })
            ->where('ind_vigencia', 'S')
            ->paginate();

        return view('livewire.admin.motivo-index', compact('bsd_motivo'));
    }
}
