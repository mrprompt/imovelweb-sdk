<?php
namespace MrPrompt\ImovelWeb\Tests\Base;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\ClientInterface;

abstract class Base extends TestCase
{
    protected ClientInterface $client;
    protected string $token;
    protected string $environment;

    public function setUp(): void
    {
        parent::setUp();

        $this->token = uniqid();
        $this->environment = 'local';
    }
}
