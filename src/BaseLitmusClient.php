<?php

namespace Allphat\Litmus;

use Symfony\Component\HttpClient\HttpClient;

class BaseLitmusClient
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $apiUsername;

    /**
     * @var string
     */
    private $apiPassword;

    public function __construct(string $apiUsername, string $apiPassword)
    {
        $this->apiUsername = $apiUsername;
        $this->apiPassword = $apiPassword;

        $this->getClient();
    }

    public function getClient()
    {
        $this->client = HttpClient::create();
    }

    public function getLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
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
         $response = $this->client->request($method, $path, [
            'auth_basic' => [$this->getApiUsername(), $this->getApiPassword()],
            'query' => isset($params['query']) ? $params['query'] : null,
            'json' => isset($params['post']) ? $params['post'] : null,
         ]);

        //@TODO add method to check for http status of response

        return $response;
    }
}
