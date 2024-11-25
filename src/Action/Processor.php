<?php

namespace Lokal\Processor\Action;

use Lokal\Processor\Exceptions\ExecutionException;

abstract class Processor
{
    /**
     * Define process mechanism
     * @param array $parameters
     * @param mixed|null $identity
     * @return mixed
     */
    abstract protected function saving(array $parameters, mixed $identity = null): mixed;

    /**
     * Execute process
     * @param Parameter $parameter
     * @return mixed
     * @throws ExecutionException
     */
    public function execute(Parameter $parameter): mixed
    {
        try {
            return $this->saving($parameter->parameters(), $parameter->getIdentity());
        } catch (\Exception $exception) {
            throw new ExecutionException($exception->getMessage(), 500, $exception);
        }
    }
}