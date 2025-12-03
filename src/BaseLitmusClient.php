<?php

namespace Allphat\Litmus;

use Symfony\Component\HttpClient\HttpClient;

class BaseLitmusClient
{
    private $client=null;

    private Loggerinterface $logger;

    private string $apiKey;

    private string $apiUsername;

    private string $apiPassword;

    public function __construct(string $apiKey, string $apiUsername, string $apiPassword)
    {
        $this->apiKey = $apiKey;
        $this->apiUsername = $apiUsername;
        $this->apiPassword = $apiPassword;
    }

    public function setClient()
    {
        if ($this->client === null) {
            $this->client = HttpClient::create();
        }

        return $this->client;
    }

    public function getLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getApiUsername()
    {
        return $this->apiUsername;
    }

    public function getApiPassword()
    {
        return $this->apiPassword;
    }

    public function request($method, $path, $params=[])
    {
        $this->client = $this->setClient();

        $response = $this->client->request($method, $path, [
            //'auth_basic' => [$this->getApiUsername(), $this->getApiPassword()],
            'auth_basic' => [$this->getApiKey(), ''],
            'query' => isset($params['query']) ? $params['query'] : null,
            'json' => isset($params['post']) ? $params['post'] : null,
        ]);

        return $response;
    }
}
