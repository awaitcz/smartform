<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Client;

use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidatedAddressResponse;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperedAddressResponse;
use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;

final class AddressClient extends AbstractClient
{

	public function whisper(WhisperAddress $addressRequest): WhisperedAddressResponse
	{
		$body = Json::encode($addressRequest->toArray());

		$response = $this->doRequest(
			new Request('POST', self::BASE_URL . '/oracle/v9', [], $body),
		);

		$decodedResponse = $this->evaluateResponse($response);

		return WhisperedAddressResponse::fromArray($decodedResponse);
	}

	public function validate(ValidateAddress $addressRequest): ValidatedAddressResponse
	{
		$body = Json::encode($addressRequest->toArray());

		$response = $this->doRequest(
			new Request('POST', self::BASE_URL . '/validateAddress/v9', [], $body),
		);

		$decodedResponse = $this->evaluateResponse($response);

		return ValidatedAddressResponse::fromArray($decodedResponse);
	}

}
