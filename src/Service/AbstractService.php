<?php

namespace Allphat\Litmus\Service;

abstract class AbstractService
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }
}
