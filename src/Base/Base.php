<?php
namespace ImovelWeb\Base;

use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use JsonSchema\Validator;
use Psr\Http\Client\ClientInterface;

abstract class Base
{
    /**
     * @var ClientInterface
     */
    protected $client;

    const SEPARATOR = '|';

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
     * Do an HTTP request.
     *
     * @param string $method
     * @param string $uri
     * @param array $parameters
     * @param string|null $validator
     * @return mixed
     */
    protected function request(string $method, string $uri, array $parameters = [], string $validator = null)
    {
        try {
            if (!is_null($validator)) {
                $dataToValidate = array_shift($parameters);

                $this->validate($validator, $dataToValidate);
            }

            $response = $this->client->request($method, $uri, $parameters);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            $xml = simplexml_load_string($clientException->getResponse()->getBody());

            return json_decode(json_encode($xml), true);
        } catch (InvalidArgumentException $invalidArgumentException) {
            $xml = explode(self::SEPARATOR, $invalidArgumentException->getMessage());

            return json_decode(json_encode($xml), true);
        }
    }

    /**
     * Validate using a schema.
     *
     * @param string $namespace
     * @param array $data
     * @return bool
     */
    public function validate(string $namespace, array $data): bool
    {
        $schemaFile = $this->schema($namespace);

        $validator = new Validator;
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
