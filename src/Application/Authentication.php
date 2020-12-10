<?php
namespace MrPrompt\ImovelWeb\Application;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Authentication extends Base
{
    public function login(string $clientId, string $clientSecret, string $grantType = 'client_credentials')
    {
        try {
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
        } catch (ClientException $clientException) {

        }
    }

    public function logout(string $clientId, string $clientSecret, string $token)
    {
        try {
            $response = $this->client->request(
                'post',
                'application/logout',
                [
                    'form_params' => [
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                        'token' => $token,
                    ]
                ]
            );

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {

        }
    }
}
