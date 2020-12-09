<?php
namespace MrPrompt\ImovelWeb\Base;

use GuzzleHttp\Client;

final class HttpClient extends Client
{
    public const USER_AGENT = 'ImovelWeb HTTP Client';

    /**
     * @var string
     */
    public string $baseUrl = '/';

    /**
     * @var array
     */
    public array $headers;

    /**
     * Initialize the HTTP Client used by SDK.
     *
     * @param string $token The access token
     */
    public function __construct(string $token)
    {
        parent::__construct();

        $this->headers = [
            'Content-Type' => 'application/json',
            'User-Agent' => self::USER_AGENT,
            'Cache-Control' => 'no-cache',
            'Connection' => 'Keep-Alive',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
    }
}
