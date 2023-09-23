<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class GuzzleClient implements IHttpClient
{

	private Client $client;

	public function __construct()
	{
		$this->client = new Client([
			'http_errors' => false,
			'timeout' => 30,
		]);
	}

	public function sendRequest(RequestInterface $request): ResponseInterface
	{
		return $this->client->sendRequest($request);
	}

}
