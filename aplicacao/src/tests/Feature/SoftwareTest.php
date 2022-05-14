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
}
