<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PictureControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function testIndex()
    {
        $response = $this->get('/pictures');

        $response->assertStatus(200);
    }
}
