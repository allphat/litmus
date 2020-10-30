<?php

namespace Allphat\Tests\Litmus;

use Allphat\Litmus\Exception\LitmusException;
use Allphat\Litmus\Factory;
use Allphat\Litmus\LitmusClient;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private $litmusClient;

    private $factory;

    public function setUp():void
    {
        $this->litmusClient = $this->createMock(Litmusclient::class);

        $this->factory = new Factory($this->litmusClient);
    }

    public function testGetException()
    {
        $this->expectException(LitmusException::class);
        $result = $this->factory->__get('unknown');
    }

    public function testGet()
    {
        $result = $this->factory->__get('instant');
        
        $this->assertInstanceOf(\Allphat\Litmus\Service\Instant::class, $result);
    }
}
