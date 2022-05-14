<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\SoftwareController;
use App\Http\Requests\SoftwareRequest;
use Illuminate\Http\Request;

class SoftwareTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_integrity()
    {
        $softwareController = new SoftwareController();

        $integrityRequest = new Request([
            'params' => [
                'a' => 25,
                's' => 95,
            ]
        ]);

        $result = $softwareController->integrity($integrityRequest);

        $this->assertIsArray($result);
        
        $this->assertCount(3, $result);

        $this->assertEquals(0.25, $result[0]["value"]);
        $this->assertEquals(0.95, $result[1]["value"]);
        $this->assertEquals(0.9875, $result[2]["value"]);
    }

    public function test_agile_metrics()
    {
        $softwareController = new SoftwareController();

        $agileMetricsRequest = new SoftwareRequest([
            'params' => [
                'repo_data' => 'carlosmds/eng-software',
                'total_lines_of_test' => 200,
                'total_test_cases' => 10,
                'total_assertions' => 120,
                'total_assertions_unit' => 42,
                'assertions_passing_unit' => 26,
                'assertions_failing_unit' => 2,
                'number_of_feature_tests' => 32,
                'number_of_feature_tests_on_last_iteration' => 25,
                'total_assertions_feature' => 78,
                'assertions_passing_feature' => 62,
                'assertions_failing_feature' => 16,
            ]
        ]);

        $result = $softwareController->agileMetrics($agileMetricsRequest);


        $this->assertIsArray($result);
        
        $this->assertCount(8, $result);

        $this->assertEquals(0.0019559137050873315, $result[0]["value"]);
        $this->assertEquals(0.00009779568525436658, $result[1]["value"]);
        $this->assertEquals(0.001173548223052399, $result[2]["value"]);
        $this->assertEquals(0.6190476190476191, $result[3]["value"]);
        $this->assertEquals(0.047619047619047616, $result[4]["value"]);
        $this->assertEquals(7, $result[5]["value"]);
        $this->assertEquals(0.7948717948717948, $result[6]["value"]);
        $this->assertEquals(0.20512820512820512, $result[7]["value"]);
    }
}
