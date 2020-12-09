<?php
namespace MrPrompt\ImovelWeb\Tests\Base;

use Faker\Generator;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\ClientInterface;
use MrPrompt\ImovelWeb\Tests\Traits\FakeHttpClient;

abstract class Base extends TestCase
{
    use FakeHttpClient;

    protected ClientInterface $client;
    protected Generator $faker;
    protected object $service;

    protected string $token;
    protected string $environment;

    public function setUp(): void
    {
        parent::setUp();

        $this->token = uniqid();
        $this->environment = 'local';
        $this->faker = \Faker\Factory::create();
    }
}
