<?php

namespace Test\Unit;

use RoundPartner\Tempus\Tempus;
use \PHPUnit\Framework\TestCase;

class TempusTest extends TestCase
{
    /**
     * @var Tempus
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new Tempus();
    }

    public function testGetsAToken()
    {
        $response = $this->instance->get();
        $this->assertNotFalse($response);
    }
}