# Imóvel  Web - SDK

![Tests](https://github.com/mrprompt/imovelweb-sdk/workflows/Tests/badge.svg)
![Lint](https://github.com/mrprompt/imovelweb-sdk/workflows/Lint/badge.svg)

## Instalação

```shell script
composer require mrprompt/imovelweb-sdk
```

# Uso

Prepare o cliente HTTP com sua credencial e ambiente.

```php
use MrPrompt\ImovelWeb\Base\HttpClient as Client;

$token = env('IMOVELWEB_TOKEN');
$environment = env('IMOVELWEB_ENVIRONMENT'); // production | sandbox

$client = new Client($token, $environment);
```

### Autenticação

Login

```php
use MrPrompt\ImovelWeb\Application\Authentication;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$authentication = new Authentication($client);
$authentication->login('CLIENT_ID', 'CLIENT_SECRET');
```

Logout

```php
use MrPrompt\ImovelWeb\Application\Authentication;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$authentication = new Authentication($client);
$authentication->logout('CLIENT_ID', 'CLIENT_SECRET', 'ACCESS_TOKEN');
```

### Anúncios

Anúncios

```php
use MrPrompt\ImovelWeb\Anuncios\Anuncios;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$anuncios = new Anuncios($client);
$anuncios->resumo(string $imobiliaria, array $args = []);
$anuncios->remover(string $imobiliaria, string $anuncio);
$anuncios->info(string $imobiliaria, string $anuncio);
$anuncios->atualizar(string $imobiliaria, string $anuncio, array $detalhes = []);
$anuncios->associar(string $imobiliaria, string $origem, string $destino);
$anuncios->qualidade(string $imobiliaria, string $anuncio);
$anuncios->status(string $imobiliaria, string $anuncio);
```

Lançamentos

```php
use MrPrompt\ImovelWeb\Anuncios\Lancamentos;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$lancamentos = new Lancamentos($client);
$lancamentos->resumo(string $imobiliaria, string $lancamento);
$lancamentos->info(string $imobiliaria, string $lancamento);
$lancamentos->atualizar(string $imobiliaria, string $lancamento, array $detalhes = []);
```

### Imobiliárias

Anúncios

```php
use MrPrompt\ImovelWeb\Imobiliarias\Imobiliarias;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$imobiliarias = new Imobiliarias($client);
$imobiliarias->listar();
$imobiliarias->desvincular(string $imobiliaria);
$imobiliarias->ftp(string $imobiliaria);
$imobiliarias->qualidade(string $imobiliaria);
```

### Vendas

Vendas

```php
use MrPrompt\ImovelWeb\Vendas\Vendas;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$vendas = new Vendas($client);
$vendas->listar();
$vendas->grade(string $imobiliaria);
```

### Configurações

Callbacks

```php
use MrPrompt\ImovelWeb\Configuracao\Callbacks;

/* @var $client \MrPrompt\ImovelWeb\Base\HttpClient */
$callbacks = new Callbacks($client);
$callbacks->listar();
$callbacks->atualizar(array $configuracoes);
```

# Documentação

http://api-br.open.navent.com/