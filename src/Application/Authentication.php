<?php
namespace MrPrompt\ImovelWeb\Application;

use GuzzleHttp\ClientInterface;

class Authentication
{
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function login(string $clientId, string $clientSecret, string $grantType = 'client_credentials')
    {
        $response = $this->client->request(
            'post',
            'application/login',
            [
                'form_params' => [
                    'grant_type' => $grantType,
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                ]
            ]
        );

        return json_decode($response->getBody(), true);
    }

    public function logout(string $clientId, string $clientSecret, string $token)
    {
        $response = $this->client->request(
            'post',
            'application/login',
            [
                'form_params' => [
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'token' => $token,
                ]
            ]
        );

        return json_decode($response->getBody(), true);
    }
}
