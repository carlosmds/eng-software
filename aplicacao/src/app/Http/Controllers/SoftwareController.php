<?php
namespace App\Http\Controllers;
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