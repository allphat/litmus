<?php

namespace Allphat\Litmus;

use Symfony\Component\HttpClient\HttpClient;

class BaseLitmusClient
{
    /**
     * @var HttpClient|null
     */
    private $client=null;

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
            'auth_basic' => [$this->getApiUsername(), $this->getApiPassword()],
            'query' => isset($params['query']) ? $params['query'] : null,
            'json' => isset($params['post']) ? $params['post'] : null,
         ]);

        //@TODO add method to check for http status of response

        return $response;
    }
}
