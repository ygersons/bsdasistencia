<?php

namespace App\Livewire\Admin;

use App\Models\BsdAsistencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class AsistenciaRelojIndex extends Component
{

    protected $paginationTheme = "bootstrap";
    use WithPagination;


    public $search;
    //>where('date', '>=', DB::raw('curdate()')
    public function render()
    {
		$user = Auth::user();
        $bsd_asistencia =BsdAsistencia::where('fechaA', '=', DB::raw('curdate()'))
        ->where('usuario_reg',$user->name)
        ->orderBy('entradaA', 'DESC')
        ->paginate(1);
        return view('livewire.admin.asistencia-reloj-index',compact('bsd_asistencia'));
    }
}
//SELECT * FROM bsd_asistencia WHERE fechaA = CURDATE() ORDER BY entradaA DESC
//LIMIT 5
