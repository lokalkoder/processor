<?php
namespace Lokal\Processor\Manager;

use Lokal\Processor\Action\Parameter;
use Lokal\Processor\Action\Processor;
use Lokal\Processor\Action\Response;
use Lokal\Processor\Concern\HasValidation;

final class Action
{
    use HasValidation;

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
    public function process(): array
    {
        $message = $this->parameters->responseMessage();
        $code = null;

        try {
            if ($this->isValid()) {
                $this->processor->execute($this->parameters);
                $code = 200;
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return (new Response($message, http_response_code($code)))->getResponseMessage();
    }

    /**
     * @return mixed|null
     */
    public function model(): mixed
    {
        return $this->isValid() ? $this->processor->execute($this->parameters) : null;
    }
}