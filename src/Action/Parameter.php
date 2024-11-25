<?php

namespace Lokal\Processor\Action;

abstract class Parameter
{
    /**
     * Initiate parameter class
     * @param array $inputs
     * @param int|null $identity
     */
    public function __construct(
        protected array $inputs,
        protected ?int $identity = null
    ){}

    /**
     * Get identity for update.
     * @return int|null
     */
    public function getIdentity(): int|null
    {
        return $this->identity;
    }

    /**
     * Get identity for update.
     * @return string
     */
    public function responseMessage(): string
    {
        return 'OK';
    }

    /**
     * Get input parameters
     * @return array
     */
    public function parameters(): array
    {
        $params = [];

        foreach ($this->mapping() as $request => $input) {
            if (array_key_exists($request, $this->inputs)) {
                $params[$input] = $this->inputs[$request];
            }
        }

        return $params;
    }

    /**
     * Map the model fields
     * Format : [ 'request files' => 'model field' ]
     */
    abstract protected function mapping(): array;
}