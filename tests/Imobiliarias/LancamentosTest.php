<?php
namespace MrPrompt\ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Imobiliarias\Lancamentos;
use MrPrompt\ImovelWeb\Tests\Base\Base;

final class LancamentosTest extends Base
{
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
          "etapaDesarrollo": "string",
          "fechaEntrega": "string",
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
            "fechaOffline": "2020-12-10T16:00:11.827Z",
            "fechaOnline": "2020-12-10T16:00:11.827Z",
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
          "titulo": "string",
          "unidades": [
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
                "fechaOffline": "2020-12-10T16:00:11.827Z",
                "fechaOnline": "2020-12-10T16:00:11.827Z",
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
          ],
          "urlLogo": "string"
        }
        ');

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamentos($this->client);

        $result = $this->service->info('15447738', '3214568');

        $this->assertArrayHasKey('caracteristicas', $result);
        $this->assertArrayHasKey('descripcion', $result);
        $this->assertArrayHasKey('titulo', $result);
        $this->assertArrayHasKey('precios', $result);
    }

    /**
     * @test
     */
    public function atualizar()
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
            new Response(201, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamentos($this->client);

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
          "etapaDesarrollo": "string",
          "fechaEntrega": "string",
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
            "fechaOffline": "2020-12-10T16:00:11.754Z",
            "fechaOnline": "2020-12-10T16:00:11.754Z",
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
          "titulo": "string",
          "unidades": [
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
                "fechaOffline": "2020-12-10T16:00:11.754Z",
                "fechaOnline": "2020-12-10T16:00:11.754Z",
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
          ],
          "urlLogo": "string"
        }
        '), true);
        $result = $this->service->atualizar('15447738', '3214568', $detalhes);

        $this->assertArrayHasKey('codigoAviso', $result[0]);
        $this->assertArrayHasKey('errors', $result[0]);
        $this->assertArrayHasKey('warnings', $result[0]);
        $this->assertArrayHasKey('idEmpresa', $result[0]);
    }
}
