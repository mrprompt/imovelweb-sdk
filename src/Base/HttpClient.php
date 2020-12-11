<?php
namespace MrPrompt\ImovelWeb\Base;

use GuzzleHttp\Client;

final class HttpClient extends Client
{
    public const USER_AGENT = 'ImovelWeb HTTP Client';
    public const PRODUCTION  = 'production';
    public const SANDBOX = 'sandbox';
    private const CLIENT_URLS = [
        self::PRODUCTION => 'http://api-br.open.navent.com/v1/',
        self::SANDBOX => 'http://api-br.sandbox.open.navent.com/v1/',
    ];

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
     * @param string $mode The environment
     */
    public function __construct(string $token, string $mode = 'production')
    {
        parent::__construct();

        $this->baseUrl = self::CLIENT_URLS[$mode];

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
