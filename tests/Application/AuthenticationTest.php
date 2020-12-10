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
        $handleResponse = '{
            "access_token": "9afb6554-28ca-422b-85c4-f14d6381d6e5",
            "token_type": "bearer",
            "expires_in": 315350721,
            "scope": "read write trust"
        }';

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

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
        $handleResponse = '
        <BadClientCredentialsException>
            <error>invalid_client</error>
            <error_description>Bad client credentials</error_description>
        </BadClientCredentialsException>
        ';

        $handlerStack = [
            new Response(401, [], $handleResponse),
        ];

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

        $handlerStack = [
            new Response(204, [], $handleResponse),
        ];

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
        $handleResponse = '
        <BadClientCredentialsException>
            <error>invalid_client</error>
            <error_description>Bad client credentials</error_description>
        </BadClientCredentialsException>
        ';

        $handlerStack = [
            new Response(401, [], $handleResponse),
        ];

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
