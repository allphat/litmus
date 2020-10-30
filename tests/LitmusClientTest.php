<?php

namespace Allphat\Tests\Litmus;

use Allphat\Litmus\Exception\LitmusException;
use Allphat\Litmus\LitmusClient;
use PHPUnit\Framework\TestCase;

class LitmusClientTest extends TestCase
{
    private $litmusClient;

    public function setUp():void
    {
        $this->litmusClient = new LitmusClient('username', 'password');
    }

    public function testGetApiUsername()
    {
        $result = $this->litmusClient->getApiUsername();

        $this->assertEquals('username', $result);
    }

    public function testGetApiPassword()
    {
        $result = $this->litmusClient->getApiPassword();
        
        $this->assertEquals('password', $result);
    }

    public function testSetClient()
    {
        $result = $this->litmusClient->setClient();

        $this->assertInstanceOf('\Symfony\Contracts\HttpClient\HttpClientInterface', $result);
    }
}
