<?php
namespace Lokal\Processor\Manager;

use Lokal\Processor\Action\Parameter;
use Lokal\Processor\Action\Processor;
use Lokal\Processor\Action\Response;
use Lokal\Processor\Concern\HasValidation;

final class Action
{
    use HasValidation;

    protected mixed $execution;

    /**
     * Initiate Action
     * @param Parameter $parameters
     * @param Processor $processor
     */
    public function __construct(
        protected Parameter $parameters,
        protected Processor $processor
    ){}

    /**
     * Process the request
     * @return array
     */
    public function response(): array
    {
        $message = $this->parameters->responseMessage();
        $code = 200;

        try {
            $this->process();
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = $exception->getCode();
        }

        return (new Response($message, http_response_code($code)))->getResponseMessage();
    }

    /**
     * @return mixed|null
     */
    public function process(): mixed
    {
        return $this->isValid() ? $this->processor->execute($this->parameters) : null;
    }
}