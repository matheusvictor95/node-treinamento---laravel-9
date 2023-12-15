<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index');
    }
    public function index(){
        $usuarios = User::all()->count();
        
     

        //gráfico 1 - usuários
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano','asc')
        ->get();

        //preparar arrays
            foreach ($usersData as $user) {
                $ano[] = $user->ano;
                $total[] = $user->total;
            }

        //formatar para chart.js
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',',$ano);
        $userTotal = implode(',', $total);
        
        //gráfico 2 - categorias
        $catData = Categoria::with('produtos')->get();

        //preparar array
        foreach ($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
        }

        //formatar oara chart.js
        $catLabel = implode(',',$catNome);
        $catTotal = implode(',',$catTotal);
        return view('admin.dashboard', compact('usuarios', 'userLabel','userAno','userTotal','catLabel','catTotal',));
    }
}
