<?php
namespace ImovelWeb\Application;

use GuzzleHttp\Exception\ClientException;
use ImovelWeb\Base\Base;

final class Authentication extends Base
{
    /**
     * Application login
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @return mixed
     */
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
            $xml = simplexml_load_string($clientException->getResponse()->getBody());

            return json_decode(json_encode($xml), true);
        }
    }

    /**
     * Logout de usuario
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $token
     * @return mixed
     */
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
            $xml = simplexml_load_string($clientException->getResponse()->getBody());

            return json_decode(json_encode($xml), true);
        }
    }
}
