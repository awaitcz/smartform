<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Client;

use Awaitcz\SmartForm\Config;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Exception\ClientException;
use Awaitcz\SmartForm\Http\IHttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use function assert;
use function base64_encode;
use function is_array;
use function json_decode;

abstract class AbstractClient
{

	public const BASE_URL = 'https://secure.smartform.cz/smartform-ws';

	public function __construct(private Config $config, private IHttpClient $client)
	{
	}

	protected function doRequest(RequestInterface $request): ResponseInterface
	{
		$request = $request->withHeader('Content-Type', 'application/json');
		$request = $request->withHeader('Accept', 'application/json');
		$request = $request->withHeader(
			'Authorization',
			'Basic ' . base64_encode($this->config->getClientId() . ':' . $this->config->getToken()),
		);

		if ($this->config->isTestMode()) {
			$request = $request->withHeader('test', 'true');
		}

		return $this->client->sendRequest($request);
	}

	protected function assertResponse(ResponseInterface $response, int $code = 200): void
	{
		if ($response->getStatusCode() !== $code) {
			$decodedResponse = json_decode($response->getBody()->getContents(), false);

			throw new ClientException($decodedResponse->errorMessage, $response->getStatusCode());
		}
	}

	/**
	 * @return array<string, mixed>
	 */
	protected function decodeResponse(ResponseInterface $response, int $code = 200): array
	{
		$this->assertResponse($response, $code);

		$data = json_decode($response->getBody()->getContents(), true);
		assert(is_array($data));

		return $data;
	}

	/**
	 * @return array<string, mixed>
	 */
	protected function evaluateResponse(ResponseInterface $response, int $code = 200): array
	{
		$data = $this->decodeResponse($response, $code);
		if (ResultCode::from($data['resultCode']) === ResultCode::Fail) {
			throw new ClientException($data['errorMessage'], $response->getStatusCode());
		}

		return $data;
	}

}
