<?php
namespace MrPrompt\ImovelWeb\Base;

use GuzzleHttp\ClientInterface;

abstract class Base
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    public const PRODUCTION  = 'production';
    public const SANDBOX = 'sandbox';

    private const CLIENT_URLS = [
        self::PRODUCTION => 'http://api-br.production.open.navent.com/v1/',
        self::SANDBOX => 'http://api-br.sandbox.open.navent.com/v1/',
    ];

    /**
     * Constructor
     *
     * @param ClientInterface $client
     * @param string $mode
     */
    public function __construct(ClientInterface $client, string $mode = 'production')
    {
        $this->client = $client;
        $this->client->baseUrl = static::CLIENT_URLS[$mode];
    }
}
