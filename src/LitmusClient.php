<?php

namespace Allphat\Litmus;

class LitmusClient extends BaseLitmusClient
{
    /**
     * @var Factory 
     */
    private $factory;

    public function __get(string $name)
    {
        if (null === $this->factory) {
            $this->factory = new Factory($this);
        }

        return $this->factory->__get($name);
    }

}
