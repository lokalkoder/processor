<?php

namespace Lokal\Processor\Concern;

trait HasValidation
{
    /**
     * @var bool
     */
    protected bool $validation = true;

    /**
     * Set validation callback
     * @param callable $callback
     * @return $this
     */
    public function validationUsed(Callable $callback): static
    {
        if (is_callable($callback)) {
            $validation = call_user_func($callback);

            $this->validation = match (true) {
                is_array($validation) => empty($validation),
                default => $validation
            };
        }

        return $this;
    }

    /**
     * Check the process is meets all rules.
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->validation;
    }
}