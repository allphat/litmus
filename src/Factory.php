<?php

namespace Allphat\Litmus;

use Allphat\Litmus\Service\Instant;
use Allphat\Litmus\Service\Preview;

class Factory
{
    private static $classMap = [
        'instant' => Instant::class,
        'preview' => Preview::class,
    ];

    /**
     * @var LitmusClient
     */ 
    private $litmusClient;

    /**
     * @var array<int, string>
     */
    private $services;

    public function __construct(LitmusClient $litmusClient)
    {
        $this->litmusClient = $litmusClient;
        $this->services = [];
    }

    /**
     * @return string|null
     */
    protected function getServiceClass(string $name)
    {
        return array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }

    /**
     * @param string $name
     *
     * @return null|Factory
     */
    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->litmusClient);
            }

            return $this->services[$name];
        }
    }
}
