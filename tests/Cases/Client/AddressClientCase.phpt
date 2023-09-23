<?php declare(strict_types = 1);

namespace Tests\Cases\Client;

require __DIR__ . '/../../bootstrap.php';

use Awaitcz\SmartForm\Client\AddressClient;
use Awaitcz\SmartForm\Config;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidatedAddressResponse;
use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByWholeAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperedAddressResponse;
use Awaitcz\SmartForm\Entity\Country;
use Awaitcz\SmartForm\Entity\ResultCode;
use Awaitcz\SmartForm\Entity\ResultType;
use Awaitcz\SmartForm\Exception\ClientException;
use Awaitcz\SmartForm\Http\IHttpClient;
use GuzzleHttp\Psr7\Response;
use Mockery;
use Tester\Assert;
use Tester\TestCase;
use function file_get_contents;

final class AddressClientCase extends TestCase
{

	private function createClient(string $jsonInput): AddressClient
	{
		/** @var string $jsonInput */
		$jsonInput = file_get_contents(__DIR__ . '/../../Fixtures/Address/' . $jsonInput);

		$http = Mockery::mock(IHttpClient::class);
		$http->shouldReceive('sendRequest')
			->andReturn(new Response(200, [], $jsonInput));

		$config = new Config('foo', 'bar', false);

		return new AddressClient($config, $http);
	}

	public function testValidate(): void
	{
		$client = $this->createClient('AddressValidate.json');

		$validatedAddress = $client->validate(
			new ValidateAddress(
				countries: [Country::CzechRepublic],
				wholeAddress: 'nábřeží Edvarda Beneše 128/6',
			),
		);

		Assert::type(ValidatedAddressResponse::class, $validatedAddress);
		Assert::same(ResultCode::Ok, $validatedAddress->getResultCode());
		Assert::same(null, $validatedAddress->getErrorMessage());
		Assert::same(null, $validatedAddress->getId());
		Assert::count(1, $validatedAddress->getResult());
		Assert::same(ResultType::Hit, $validatedAddress->getResultType());
		Assert::same(null, $validatedAddress->getHint());
	}

	public function testWhisper(): void
	{
		$client = $this->createClient('AddressWhisper.json');

		$whisperAddressResult = $client->whisper(
			new WhisperAddress(
				new WhisperAddressByWholeAddress('Foo 68'),
			),
		);

		Assert::type(WhisperedAddressResponse::class, $whisperAddressResult);
		Assert::same(ResultCode::Ok, $whisperAddressResult->getResultCode());
		Assert::same(null, $whisperAddressResult->getErrorMessage());
		Assert::same(24, $whisperAddressResult->getId());
		Assert::count(1, $whisperAddressResult->getResult());
	}

	public function testWhisperWithIncorrectCredentials(): void
	{
		$http = Mockery::mock(IHttpClient::class);
		$http->shouldReceive('sendRequest')
			->andReturn(new Response(401, [], '{"errorMessage":"Wrong password.","resultCode":"FAIL"}'));

		$config = new Config('foo', 'bar', false);

		$client = new AddressClient($config, $http);

		Assert::exception(static fn () => $client->whisper(
			new WhisperAddress(
				new WhisperAddressByWholeAddress('Foo 68'),
			),
		), ClientException::class, 'Wrong password.');
	}

}

$test = new AddressClientCase();
$test->run();
