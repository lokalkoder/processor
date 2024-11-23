<?php

namespace Lokal\Processor\Concern;

use Lokal\Processor\Action\Parameter;
use Lokal\Processor\Action\Processor;
use Lokal\Processor\Manager\Action;

trait UseActionProcessor
{
    protected mixed $validator = null;

    /**
     * @param Parameter $parameter
     * @param Processor $processor
     * @return array
     */
    public function executeAction(Parameter $parameter, Processor $processor): array
    {
        $action = (new Action($parameter, $processor));

        if ($this->validator) {
            $action->validationUsed($this->validator);
        }

        return $action->response();
    }

    /**
     * @param Parameter $parameter
     * @param Processor $processor
     * @return mixed
     */
    public function modelAction(Parameter $parameter, Processor $processor): mixed
    {
        $action = (new Action($parameter, $processor));

        if ($this->validator) {
            $action->validationUsed($this->validator);
        }

        return $action->process();
    }

    /**
     * @param callable $validator
     * @return $this
     */
    public function validateAction(Callable $validator): static
    {
        $this->validator = $validator;

        return $this;
    }
}