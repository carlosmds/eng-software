<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\SoftwareController;
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
}
