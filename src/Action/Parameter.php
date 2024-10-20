<?php

namespace Lokal\Processor\Action;

abstract class Parameter
{
    /**
     * Initiate parameter class
     * @param array $fields
     * @param int|null $identity
     */
    public function __construct(
        protected array $fields,
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
     * Map the model fields
     */
    abstract public function mapping(): array;
}