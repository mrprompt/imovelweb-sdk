<?php
namespace ImovelWeb\Base;

use Psr\Http\Client\ClientInterface;

/**
 * @codeCoverageIgnore
 */
abstract class Base
{
    protected ClientInterface $client;

    /**
     * Constructor
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
