<?php
namespace MrPrompt\ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Imobiliarias\Anuncios;
use MrPrompt\ImovelWeb\Tests\Base\Base;

final class AnunciosTest extends Base
{
    /**
     * @test
     */
    public function resumoSemParametros()
    {
        $handleResponse = trim('
        {
          "content": [
            {
              "claveInterna": "string",
              "codigoAviso": "string",
              "codigoDesarrollo": "string",
              "dataModificacao": "2020-12-10T16:00:11.767Z",
              "fechaModificado": "string",
              "idAvisoNavplat": 0,
              "idDesarrolloNavplat": 0,
              "imagen": {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              },
              "publicação": "string",
              "tipoDeAviso": "string",
              "tipoDePropiedad": 0,
              "tipoDePublicacion": "string",
              "titulo": "string",
              "ubicacion": {
                "codigoPostal": "string",
                "direccion": "string",
                "idUbicacion": "string",
                "latitud": "string",
                "longitud": "string",
                "muestraMapa": "string",
                "ubicacion": "string"
              }
            }
          ],
          "number": 0,
          "size": 0,
          "total": 0
        }');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->resumo('15447738');

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

    /**
     * @test
     */
    public function resumoComParametros()
    {
        $handleResponse = trim('
        {
          "content": [
            {
              "claveInterna": "string",
              "codigoAviso": "string",
              "codigoDesarrollo": "string",
              "dataModificacao": "2020-12-10T16:00:11.767Z",
              "fechaModificado": "string",
              "idAvisoNavplat": 0,
              "idDesarrolloNavplat": 0,
              "imagen": {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              },
              "publicação": "string",
              "tipoDeAviso": "string",
              "tipoDePropiedad": 0,
              "tipoDePublicacion": "string",
              "titulo": "string",
              "ubicacion": {
                "codigoPostal": "string",
                "direccion": "string",
                "idUbicacion": "string",
                "latitud": "string",
                "longitud": "string",
                "muestraMapa": "string",
                "ubicacion": "string"
              }
            }
          ],
          "number": 0,
          "size": 0,
          "total": 0
        }');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->resumo('15447738', ['titulo' => 'Apartamento', 'codigoMoneda' => '840']);

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

    /**
     * @test
     */
    public function info()
    {
        $handleResponse = trim('
        {
          "caracteristicas": [
            {
              "id": "string",
              "idValor": "string",
              "nombre": "string",
              "valor": "string"
            }
          ],
          "claveReferencia": "string",
          "codigoAviso": "string",
          "descripcion": "string",
          "estado": "string",
          "localizacion": {
            "codigoPostal": "string",
            "direccion": "string",
            "idUbicacion": "string",
            "latitud": "string",
            "longitud": "string",
            "muestraMapa": "string",
            "ubicacion": "string"
          },
          "multimedia": {
            "imagenes": [
              {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              }
            ],
            "planos": [
              {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              }
            ],
            "recorridos360": [
              {
                "codigoRecorrido360": "string",
                "titulo": "string"
              }
            ],
            "videos": [
              {
                "codigoVideo": "string",
                "titulo": "string"
              }
            ]
          },
          "precios": [
            {
              "moneda": "string",
              "monto": "string",
              "operacion": "string"
            }
          ],
          "publicacion": {
            "fechaOffline": "2020-12-10T16:00:11.794Z",
            "fechaOnline": "2020-12-10T16:00:11.794Z",
            "tipoDePublicacion": "string"
          },
          "publicador": {
            "codigoInmobiliaria": "string",
            "emailAsesor": "string",
            "emailDeContacto": "string",
            "nombreDeContacto": "string",
            "telefonoDeContacto": "string"
          },
          "tipoDePropiedad": {
            "idSubTipo": "string",
            "idTipo": "string",
            "subTipo": "string",
            "tipo": "string"
          },
          "titulo": "string"
        }');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->info('15447738', '3214568');

        $this->assertArrayHasKey('caracteristicas', $result);
        $this->assertArrayHasKey('titulo', $result);
        $this->assertArrayHasKey('publicador', $result);
        $this->assertArrayHasKey('descripcion', $result);
    }

    /**
     * @test
     */
    public function atualizar()
    {
        $handleResponse = trim('
        {
          "codigoAviso": "string",
          "codigoAvisoPadre": "string",
          "codigoInmobiliaria": "string",
          "errors": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ],
          "estado": "string",
          "idAviso": 0,
          "idAvisoPadre": 0,
          "idEmpresa": 0,
          "informacion": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ],
          "warnings": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ]
        }
        ');

        $handlerStack = [
            new Response(201, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $detalhes  = json_decode(trim('
        {
          "caracteristicas": [
            {
              "id": "string",
              "idValor": "string",
              "nombre": "string",
              "valor": "string"
            }
          ],
          "claveReferencia": "string",
          "codigoAviso": "string",
          "descripcion": "string",
          "estado": "string",
          "localizacion": {
            "codigoPostal": "string",
            "direccion": "string",
            "idUbicacion": "string",
            "latitud": "string",
            "longitud": "string",
            "muestraMapa": "string",
            "ubicacion": "string"
          },
          "multimedia": {
            "imagenes": [
              {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              }
            ],
            "planos": [
              {
                "titulo": "string",
                "urlImagenOriginal": "string",
                "urlImagenPortal": "string"
              }
            ],
            "recorridos360": [
              {
                "codigoRecorrido360": "string",
                "titulo": "string"
              }
            ],
            "videos": [
              {
                "codigoVideo": "string",
                "titulo": "string"
              }
            ]
          },
          "precios": [
            {
              "moneda": "string",
              "monto": "string",
              "operacion": "string"
            }
          ],
          "publicacion": {
            "fechaOffline": "2020-12-10T16:00:11.750Z",
            "fechaOnline": "2020-12-10T16:00:11.750Z",
            "tipoDePublicacion": "string"
          },
          "publicador": {
            "codigoInmobiliaria": "string",
            "emailAsesor": "string",
            "emailDeContacto": "string",
            "nombreDeContacto": "string",
            "telefonoDeContacto": "string"
          },
          "tipoDePropiedad": {
            "idSubTipo": "string",
            "idTipo": "string",
            "subTipo": "string",
            "tipo": "string"
          },
          "titulo": "string"
        }
        '), true);
        $result = $this->service->atualizar('15447738', '3214568', $detalhes);

        $this->assertArrayHasKey('errors', $result);
        $this->assertArrayHasKey('warnings', $result);
        $this->assertArrayHasKey('informacion', $result);
        $this->assertArrayHasKey('codigoInmobiliaria', $result);
    }

    /**
     * @test
     */
    public function associar()
    {
        $handleResponse = trim('
        {
          "code": "string",
          "resposta": "string"
        }
        ');

        $handlerStack = [
            new Response(204, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->associar('15447738', '3214568', '1254563');

        $this->assertArrayHasKey('code', $result);
        $this->assertArrayHasKey('resposta', $result);
    }

    /**
     * @test
     */
    public function qualidade()
    {
        $handleResponse = trim('
        {
          "codigoAviso": "string",
          "idAvisoNavplat": "string",
          "mensajeCalidad": "string",
          "porcentajeCalidad": 0,
          "statusCalidad": "string",
          "validaciones": [
            {
              "mensaje": "string",
              "porcentajeAMejorar": 0,
              "status": "string",
              "sugerencia": "string"
            }
          ]
        }
        ');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->qualidade('15447738', '3214568');

        $this->assertArrayHasKey('codigoAviso', $result);
        $this->assertArrayHasKey('idAvisoNavplat', $result);
        $this->assertArrayHasKey('mensajeCalidad', $result);
        $this->assertArrayHasKey('porcentajeCalidad', $result);
        $this->assertArrayHasKey('statusCalidad', $result);
        $this->assertArrayHasKey('validaciones', $result);
    }

    /**
     * @test
     */
    public function status()
    {
        $handleResponse = trim('
        {
          "cantidadDeVisitas": 0,
          "codigoAviso": "string",
          "codigoDesarrollo": "string",
          "errores": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ],
          "estado": "string",
          "fechaCreacion": "2020-12-10T16:00:11.817Z",
          "fechaModificacion": "2020-12-10T16:00:11.817Z",
          "fechaModificacionOpen": "2020-12-10T16:00:11.817Z",
          "fechaOffline": "2020-12-10T16:00:11.817Z",
          "fechaOnline": "2020-12-10T16:00:11.817Z",
          "idAvisoNavplat": 0,
          "idDesarrolloNavplat": 0,
          "notificaciones": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ],
          "notificações": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ],
          "publicacion": "string",
          "statusImagenes": [
            {
              "codigoAviso": "string",
              "codigoInmobiliaria": "string",
              "error": "string",
              "fechaEncolado": "2020-12-10T16:00:11.817Z",
              "idImagenNavplat": 0,
              "intentosDeDescarga": 0,
              "orden": 0,
              "statusDownload": "string",
              "titulo": "string",
              "urlNavplat": "string",
              "urlOrigen": "string"
            }
          ],
          "warnings": [
            {
              "idAviso": 0,
              "idInterfaceRun": 0,
              "idMessage": 0,
              "messageCode": "string",
              "messageText": "string",
              "messageType": "string"
            }
          ]
        }
        ');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->status('15447738', '3214568');

        $this->assertArrayHasKey('cantidadDeVisitas', $result);
        $this->assertArrayHasKey('codigoAviso', $result);
        $this->assertArrayHasKey('codigoDesarrollo', $result);
        $this->assertArrayHasKey('warnings', $result);
    }

    /**
     * @test
     */
    public function remover()
    {
        $handleResponse = trim('
        [
          {
            "codigoAviso": "string",
            "codigoAvisoPadre": "string",
            "codigoInmobiliaria": "string",
            "errors": [
              {
                "idAviso": 0,
                "idInterfaceRun": 0,
                "idMessage": 0,
                "messageCode": "string",
                "messageText": "string",
                "messageType": "string"
              }
            ],
            "estado": "string",
            "idAviso": 0,
            "idAvisoPadre": 0,
            "idEmpresa": 0,
            "informacion": [
              {
                "idAviso": 0,
                "idInterfaceRun": 0,
                "idMessage": 0,
                "messageCode": "string",
                "messageText": "string",
                "messageType": "string"
              }
            ],
            "warnings": [
              {
                "idAviso": 0,
                "idInterfaceRun": 0,
                "idMessage": 0,
                "messageCode": "string",
                "messageText": "string",
                "messageType": "string"
              }
            ]
          }
        ]
        ');

        $handlerStack = [
            new Response(204, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->remover('15447738', '3214568');

        $this->assertArrayHasKey('codigoAviso', $result[0]);
        $this->assertArrayHasKey('codigoAvisoPadre', $result[0]);
        $this->assertArrayHasKey('codigoInmobiliaria', $result[0]);
        $this->assertArrayHasKey('idAviso', $result[0]);
    }
}
