<?php
namespace ImovelWeb\Application;

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
        $uri = 'application/login';
        $body = [
            'form_params' => [
                'grant_type' => $grantType,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ]
        ];

        return $this->request('POST', $uri, $body);
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
        $uri = 'application/logout';
        $body = [
            'form_params' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'token' => $token,
            ]
        ];

        return $this->request('POST', $uri, $body);
    }
}
