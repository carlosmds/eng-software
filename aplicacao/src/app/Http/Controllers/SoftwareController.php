<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Guzzle;

class SoftwareController extends Controller
{
    public function getLinesOfCode(Request $request)
    {
        // request -> chamar o repositório
        // https://codetabs.com/count-loc/count-loc-online.html
        // https://github.com/carlosmds/eng-software
        
        $response = Guzzle::get("https://api.codetabs.com/v1/loc?source=$request->repo_data")

        return [$response];
    }

    public function programVolume(Request $request)
    {
        // n1 = nº de operadores distintos que aparecem em um programa
        // n2 = nº de operandos distintos que aparecem em um programa
        // _N1 = nº total de ocorrencias de operador
        

        $n1 = 0;
        $n2 = 0;
        $_N1 = 0;
        $_N2 = 0;

        $volume = 0;
                
        $_N1 = $n1 * log2($n1) + $n2 * log2($n2)
        $volume = $_N1 * log2($n1+$n2);

        $response = [];
        return $response;
    }

    public function algorithmVolume(Request $request)
    {
        // _N2 = nº total de ocorrencias de operando
        L = (2/n1) * (n2/_N2)
        
        $response = [];
        return $response;
    }

    public function maturity(Request $request)
    {
        INDICE DE MATURIDADE DE SOFTWARE
        Mt = numero de módulos na versão atual
        Fc = número de módulos na versão atual que foram alterados
        Fa = número de módulos na versão atual que foram acrescentados
        Fd = número de módulos que foram excluídos

        SMI = (Mt - (Fa + Fc + Fd))/Mt

        $response = [];
        return $response;
    }

    public function integrity(Request $request)
    {
        // A = ameaça (0.25)
        // S = segurança (0.95)

        // integridade = sum(); não fazer com soma
        // integridade = ( 1 - (A * (1 - S)) )
        
        $response = [];
        return $response;
    }
}