<?php
namespace MrPrompt\ImovelWeb\Tests\Application;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Tests\Base\Base;
use MrPrompt\ImovelWeb\Application\Authentication;

final class AuthenticationTest extends Base
{
    /**
     * @test
     */
    public function loginWithValidCredentials()
    {
        $handleResponse = $this->responseFixture(__FUNCTION__);
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Authentication($this->client);

        $result = $this->service->login(
            $this->faker->shuffleString(),
            $this->faker->randomNumber(6)
        );

        $this->assertArrayHasKey('access_token', $result);
        $this->assertArrayHasKey('token_type', $result);
        $this->assertArrayHasKey('expires_in', $result);
        $this->assertArrayHasKey('scope', $result);
    }

    /**
     * @test
     */
    public function loginWithInvalidCredentials()
    {
        $handleResponse = $this->responseFixture(__FUNCTION__);
        $handlerStack = [new Response(401, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Authentication($this->client);

        $result = $this->service->login(
            $this->faker->shuffleString(),
            $this->faker->randomNumber(6)
        );

        $this->assertEmpty($result);
    }

    /**
     * @test
     */
    public function logoutWithValidCredentials()
    {
        $handleResponse = '';
        $handlerStack = [new Response(204, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Authentication($this->client);

        $result = $this->service->logout(
            $this->faker->shuffleString(),
            $this->faker->randomNumber(6),
            $this->faker->uuid,
        );

        $this->assertEmpty($result);
    }

    /**
     * @test
     */
    public function logoutWithoutClientId()
    {
        $handleResponse = $this->responseFixture(__FUNCTION__);
        $handlerStack = [new Response(401, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Authentication($this->client);

        $result = $this->service->logout(
            $this->faker->shuffleString(),
            $this->faker->randomNumber(6),
            $this->faker->uuid,
        );

        $this->assertEmpty($result);
    }
}
