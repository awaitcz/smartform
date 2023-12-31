<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface IHttpClient
{

	public function sendRequest(RequestInterface $request): ResponseInterface;

}
