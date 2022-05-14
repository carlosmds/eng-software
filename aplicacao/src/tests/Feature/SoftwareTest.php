<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SoftwareTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_integrity()
    {
        $response = $this->post('api/integrity', [
            'params' => [
                'a' => 25,
                's' => 95,
            ]
        ]);

        $response->assertStatus(200);

        $this->assertIsArray($response->json());
    }

    public function test_project_measure()
    {
        $response = $this->post('api/integrity', [
            'params' => [
                'a' => 25,
                's' => 95,
            ]
        ]);

        $response->assertStatus(200);

        $this->assertIsArray($response->json());
    }

    public function test_agile_metrics()
    {
        $response = $this->post('api/agile-metrics', [
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

        $response->assertStatus(200);

        $this->assertIsArray($response->json());
    }

    public function test_agile_metrics_status_500()
    {
        $response = $this->post('api/agile-metrics', [
            'params' => [
                //
            ]
        ]);

        $response->assertRedirect();
    }
}
