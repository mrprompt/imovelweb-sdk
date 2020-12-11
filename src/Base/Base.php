<?php
namespace ImovelWeb\Base;

use InvalidArgumentException;
use Psr\Http\Client\ClientInterface;

abstract class Base
{
    protected ClientInterface $client;
    public const SEPARATOR = '|';

    /**
     * Constructor
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $namespace
     * @param array $data
     * @return bool
     */
    public function validate(string $namespace, array $data): bool
    {
        $schemaFile = $this->schema($namespace);

        $validator = new \JsonSchema\Validator;
        $validator->validate($data, (object)['$ref' => 'file:///' . $schemaFile]);

        if ($validator->isValid()) {
            return true;
        } else {
            $errors = [];

            foreach ($validator->getErrors() as $error) {
                $errors[] = printf("[%s] %s\n", $error['property'], $error['message']);
            }

            throw new InvalidArgumentException(implode(self::SEPARATOR, $errors));
        }
    }

    /**
     * @param string $namespace
     * @return false|string
     */
    private function schema(string $namespace): string
    {
        $schemaFile = trim(strtolower(preg_replace('/[^[:alpha:]]/im', '_$1', $namespace)));

        $directorySeparator = DIRECTORY_SEPARATOR;
        $schemasDirectory = __DIR__
            . $directorySeparator
            . '..'
            . $directorySeparator
            . '..'
            . $directorySeparator
            . 'schemas';

        $fullPath = "{$schemasDirectory}{$directorySeparator}{$schemaFile}.*";
        $search = glob($fullPath);

        return realpath(array_shift($search));
    }
}
