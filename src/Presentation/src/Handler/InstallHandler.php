<?php

declare(strict_types=1);

namespace Presentation\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

class InstallHandler implements RequestHandlerInterface
{
    /**
     * @var \Closure
     */
    private $em;

    public function __construct(\Closure $em)
    {
        $this->em = $em;
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(["msg"=>$this->em->call($this)]);
    }
}