<?php

namespace Lokal\Processor\Manager;

class Response
{
    public function __construct(
        protected ?string $message = null,
        protected bool $status = true,
        protected array $data = []
    ){}

    /**
     * @return array
     */
    public function getResponseMessage(): array
    {
        return [
            /**
             * The response status.
             * @var bool $success
             */
            'success' => $this->status,
            /**
             * The response message
             * @var string $message.
             */
            'message' => $this->message,
            /**
             * The response data
             * @var array $data.
             */
            'data' => $this->data,
        ];
    }
}