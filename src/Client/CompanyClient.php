<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Client;

use Awaitcz\SmartForm\Entity\Company\Validate\ValidateCompany;
use Awaitcz\SmartForm\Entity\Company\Validate\ValidatedCompanyResponse;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperCompany;
use Awaitcz\SmartForm\Entity\Company\Whisper\WhisperedCompanyResponse;
use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;

final class CompanyClient extends AbstractClient
{

	public function whisper(WhisperCompany $addressRequest): WhisperedCompanyResponse
	{
		$body = Json::encode($addressRequest->toArray());

		$response = $this->doRequest(
			new Request('POST', self::BASE_URL . '/oracleCompany/v1', [], $body),
		);

		$decodedResponse = $this->evaluateResponse($response);

		return WhisperedCompanyResponse::fromArray($decodedResponse);
	}

	public function validate(ValidateCompany $validateRequest): ValidatedCompanyResponse
	{
		$body = Json::encode($validateRequest->toArray());

		$response = $this->doRequest(
			new Request('POST', self::BASE_URL . '/validateCompany/v1', [], $body),
		);

		$decodedResponse = $this->evaluateResponse($response);

		return ValidatedCompanyResponse::fromArray($decodedResponse);
	}

}
