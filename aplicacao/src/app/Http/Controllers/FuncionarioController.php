<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->agrupado) {
            
            $treinamentos_por_departamento = Funcionario::select('departamento', DB::raw('round(AVG(horas_treinamento_necessarias)) as media_horas'))
                  ->groupBy('departamento')
                  ->get();
        
            $response = [
                'treinamentos_por_departamento' => $treinamentos_por_departamento->toArray(),
                'media_empresa' => round(Funcionario::all()->avg('horas_treinamento_necessarias')),
            ];

        } else {

            $funcionarios = Funcionario::query();
        
            if (!empty($request->busca_departamento)) $funcionarios->where('departamento', $request->busca_departamento);

            $mais_de_5_anos = (clone $funcionarios)->where('data_admissao', '>=', now()->subYears(5)->toDateTimeString());
            $menos_de_5_anos = (clone $funcionarios)->where('data_admissao', '<=', now()->subYears(5)->toDateTimeString());

            $funcionarios->orderBy('horas_treinamento_necessarias', $request->ordem_treinamentos);
            
            $response = [
                'funcionarios' => $funcionarios->get()->toArray(),
                'media_mais_de_5_anos' => round($mais_de_5_anos->avg('horas_treinamento_necessarias')),
                'media_menos_de_5_anos' => round($menos_de_5_anos->avg('horas_treinamento_necessarias')),
            ];
        }

        return array_reverse($response);
    }

    public function store(Request $request)
    {
        $funcionario = new Funcionario($request->all());
        $funcionario->save();

        return response()->json('Funcionario created!');
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        return response()->json($funcionario);
    }

    public function update($id, Request $request)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());

        return response()->json('Funcionario updated!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();

        return response()->json('Funcionario deleted!');
    }
}