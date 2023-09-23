<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Client;

use Awaitcz\SmartForm\Entity\Email\Validate\ValidatedEmailResponse;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmail;
use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;

final class EmailClient extends AbstractClient
{

	public function validate(ValidateEmail $validateRequest): ValidatedEmailResponse
	{
		$body = Json::encode($validateRequest->toArray());

		$response = $this->doRequest(
			new Request('POST', self::BASE_URL . '/validateEmail/v1', [], $body),
		);

		$decodedResponse = $this->evaluateResponse($response);

		return ValidatedEmailResponse::fromArray($decodedResponse);
	}

}
