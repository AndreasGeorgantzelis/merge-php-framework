<?php

namespace app\Application\Middleware;

use app\Application\Interfaces\MiddlewareInterface;
use app\Application\Service\Request;

class Middleware implements MiddlewareInterface
{
    private $nextHandler;

    /**
     * @param mixed $nextHandler
     * @return Middleware
     */
    public function setNextHandler($nextHandler)
    {
        $this->nextHandler = $nextHandler;
        return $this->nextHandler;
    }

    /**
     * @param MiddlewareInterface $handler
     * @return MiddlewareInterface
     */
    public function setNext(MiddlewareInterface $handler): MiddlewareInterface
    {
        $this->setNextHandler($handler);
        return $handler;
    }

    /**
     * @return void
     */
    private function implementHandler()
    {
        $handler = MiddlewareManagement::handler(get_class($this));
        if ($handler){
            $this->setNext($handler);
        }else{
            $this->setNextHandler(null);
        }
    }

    /**
     * @param Request $request
     * @return null
     */
    public function handle(Request $request){
        $this->implementHandler();
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}