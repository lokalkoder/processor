<?php

namespace Lokal\Processor\Action;

class Response
{
    public function __construct(
        protected ?string $message = null,
        protected bool $status = true
    ){}

    /**
     * @return array
     */
    public function getResponseMessage(): array
    {
        return [
            /** @var bool $success The request status. */
            'success' => $this->status,
            /** @var string $message The response flash message. */
            'message' => $this->message,
        ];
    }
}