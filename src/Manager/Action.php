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
     */
    public function __construct(
        protected Parameter $parameters
    ){}

    /**
     * Process the request
     * @param Processor $processor
     * @return array
     */
    public function process(Processor $processor): array
    {
        $message = $this->parameters->responseMessage();
        $code = null;

        try {
            if ($this->isValid()) {
                $processor->execute($this->parameters);
                $code = 200;
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
        }

        return (new Response($message, http_response_code($code)))->getResponseMessage();
    }
}