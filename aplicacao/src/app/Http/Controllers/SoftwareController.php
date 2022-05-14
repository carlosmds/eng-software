<?php
namespace App\Http\Controllers;

use App\Http\Requests\SoftwareRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\DB;

class SoftwareController extends Controller
{
    public function getLinesOfCode(Request $request)
    {
        $httpClient = new HttpClient();
        $repositoryData = $request->params["dados"];

        $response = $httpClient->get("https://api.codetabs.com/v1/loc?github=$repositoryData");

        return $response->getBody()->getContents();
    }

    public function projectMeasure(Request $request)
    {
        $data_real_de_termino = $request->params["data_real_de_termino"];
        $data_planejada_de_termino = $request->params["data_planejada_de_termino"];
        $data_real_de_inicio = $request->params["data_real_de_inicio"];

        // Calcula a diferença em dias
        $diff_in_days_1 = (Carbon::parse($data_real_de_termino)->diffInDays($data_planejada_de_termino));
        $diff_in_days_2 = (Carbon::parse($data_real_de_inicio)->diffInDays($data_planejada_de_termino));

        // Porcentagem de variação do cronograma do projeto 
        $percentage_of_cronogram_variation = ($diff_in_days_1 * 100)/$diff_in_days_2;

        $response = [
            [
                "var" => "Percentage of cronogram variation",
                "value" => $percentage_of_cronogram_variation,
            ],
        ];

        return $response;
    }

    public function agileMetrics(SoftwareRequest $request)
    {
        $loc_data = $this->getLinesOfCode(new Request(['params' => ['dados' => $request->params["repo_data"]]]));

        $total_lines_of_test = $request->params["total_lines_of_test"];
        $total_lines_of_code = array_reverse(json_decode($loc_data))[0]->linesOfCode;

        $test_factor = ($total_lines_of_test/$total_lines_of_code);

        $total_test_cases = $request->params["total_test_cases"];
        $test_case_quantity = ($total_test_cases/$total_lines_of_code);

        $total_assertions = $request->params["total_assertions"];
        $test_assertions_quantity = ($total_assertions/$total_lines_of_code);

        $total_assertions_unit = $request->params["total_assertions_unit"];
        $assertions_passing_unit = $request->params["assertions_passing_unit"];
        $percentage_of_assertions_passing_unit = ($assertions_passing_unit / $total_assertions_unit);

        $assertions_failing_unit = $request->params["assertions_failing_unit"];
        $percentage_of_assertions_failing_unit = ($assertions_failing_unit / $total_assertions_unit);
        
        $number_of_feature_tests = $request->params["number_of_feature_tests"];
        $number_of_feature_tests_on_last_iteration = $request->params["number_of_feature_tests_on_last_iteration"];

        $quantity_of_feature_tests_by_feature = ($number_of_feature_tests - $number_of_feature_tests_on_last_iteration); 

        $total_assertions_feature = $request->params["total_assertions_feature"];

        $assertions_passing_feature = $request->params["assertions_passing_feature"];
        $percentage_of_assertions_passing_feature = ($assertions_passing_feature / $total_assertions_feature);

        $assertions_failing_feature = $request->params["assertions_failing_feature"];
        $percentage_of_assertions_failing_feature = ($assertions_failing_feature / $total_assertions_feature);
           
        $response = [
            [
                "var" => "Fator de teste",
                "value" => $test_factor,
            ],[
                "var" => "Quantidade de casos de Teste",
                "value" => $test_case_quantity ,
            ],[
                "var" => "Quantidade de casos de Assertiva",
                "value" => $test_assertions_quantity,
            ],[
                "var" => "Porcentagem de Assertivas de Teste de Unidade Passando",
                "value" => $percentage_of_assertions_passing_unit,
            ],[
                "var" => "Porcentagem de Assertivas de Teste de Unidade Falhando",
                "value" => $percentage_of_assertions_failing_unit,
            ],[
                "var" => "Quantidade de Testes de Aceitação por Funcionalidades",
                "value" => $quantity_of_feature_tests_by_feature,
            ],[
                "var" => "Porcentagem de Assertivas de Teste de Aceitação Passando",
                "value" => $percentage_of_assertions_passing_feature,
            ],[
                "var" => "Porcentagem de Assertivas de Teste de Aceitação Falhando",
                "value" => $percentage_of_assertions_failing_feature,
            ],
        ];

        return $response;
    }

    public function programVolume(Request $request)
    {
        $n1 = $request->params["n1"];
        $n2 = $request->params["n2"];

        $_N1 = ($n1 * log($n1, 2)) + ($n2 * log($n2, 2));
        $_N2 = $_N1 * log(($n1+$n2), 2);

        $response = [
            [
                "var" => "N1",
                "value" => $_N1,
            ],[
                "var" => "N2 (program volume)",
                "value" => $_N2,
            ],
        ];

        return $response;
    }

    public function algorithmVolume(Request $request)
    {
        $n1 = $request->params["n1"];
        $n2 = $request->params["n2"];

        $_N1 = ($n1 * log($n1, 2)) + ($n2 * log($n2, 2));
        $_N2 = $_N1 * log(($n1+$n2), 2);

        $_L = (2/$n1) * ($n2/$_N2);

        $response = [
            [
                "var" => "N1",
                "value" => $_N1,
            ],[
                "var" => "N2 (program volume)",
                "value" => $_N2,
            ],[
                "var" => "L (algorithm volume)",
                "value" => $_L,
            ],
        ];

        return $response;
    }

    public function maturity(Request $request)
    {
        $mt = $request->params["mt"];
        $fc = $request->params["fc"];
        $fa = $request->params["fa"];
        $fd = $request->params["fd"];

        $_SMI = ($mt - ($fa + $fc + $fd))/$mt;

        $response = [
            [
                "var" => "SMI (Índice de Maturidade de Software)",
                "value" => $_SMI,
            ],
        ];

        return $response;
    }

    public function integrity(Request $request)
    {
        $a = $request->params["a"]/100;
        $s = $request->params["s"]/100;

        $_I = (1 - ($a * (1 - $s)));

        $response = [
            [
                "var" => "A (probabilidade)",
                "value" => $a,
            ],[
                "var" => "S (probabilidade)",
                "value" => $s,
            ],[
                "var" => "I (Índice de Integridade de Software)",
                "value" => $_I,
            ],
        ];

        return $response;
    }
}