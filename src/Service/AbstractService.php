<?php

namespace Allphat\Litmus\Service;

use Symfony\Contracts\HttpClient\ResponseInterface;

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

    /**
     * @return array<int, mixed>
     *
     */
    protected function getResult(ResponseInterface $response)
    {
        return [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent()
        ];
    }

    protected function getContent(ResponseInterface $response)
    {
        return json_decode($response->getContent(), true);
    }
}
