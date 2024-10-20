<?php

namespace Lokal\Processor\Action;

abstract class Processor
{
    /**
     * Define process mechanism
     * @param array $parameters
     * @param mixed|null $identity
     * @return mixed
     */
    abstract public function entity(array $parameters, mixed $identity = null): mixed;

    /**
     * Execute process
     * @param Parameter $parameter
     * @return mixed
     */
    public function execute(Parameter $parameter): mixed
    {
        return $this->entity($parameter->mapping(), $parameter->getIdentity());
    }
}