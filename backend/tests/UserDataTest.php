<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;

class UserDataTest extends WebTestCase          
{
    private string $usuario = 'admin';

    private string $password = '12345678';
    private string $token;
/*
    public function __construct()
    {
        parent::__construct();

        $this->token = $this->getToken();
    }
*/
    private function getToken($client): string
    {
        $crawler = $client->jsonRequest(
            'POST',
            '/api/login_check',
            [
                'username' => $this->usuario,
                'password' => $this->password,
            ],);
        $response = $client->getResponse();
        $jsonContent = $response->getContent();
        $content = json_decode($jsonContent);

        return $content->token;
    }

    public function testSecurity(): void
    {
        $client = static::createClient();
        $crawler = $client->jsonRequest('GET', '/api/getUserData');

        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $client->getResponse()->getStatusCode());
    }

    public function testSuccesfulGet(): void
    {
        $client = static::createClient();
        $this->token = $this->getToken($client);

        $crawler = $client->jsonRequest('GET', '/api/getUserData', [],
            [
                'HTTP_AUTHORIZATION' => 'Bearer ' . $this->token,
            ]
        );

        $this->assertResponseIsSuccessful();

        $response = $client->getResponse();
        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
        $jsonContent = $response->getContent();
        $content = json_decode($jsonContent);

        if (isset($content->code)) {
            $this->assertTrue($content->code == 200, 'http response code is not 200');
        }
        
        $data = $content->data[0];
        $this->assertTrue(isset($data->completado), '`completado` field missing');
        $this->assertTrue(isset($data->preguntas), '`preguntas` field missing');
        $this->assertTrue(isset($data->preguntas[0]->titulo), '`titulo` field missing');
        $this->assertTrue(isset($data->preguntas[0]->descripcion), '`descripcion` field missing');
        $this->assertTrue(isset($data->preguntas[0]->respuesta), '`respuesta` field missing');
        $this->assertTrue(isset($data->producto), '`producto` field missing');
        $this->assertTrue(isset($data->producto->tasaInteres), '`producto.tasaInteres` field missing');
        $this->assertTrue(isset($data->producto->plazo), '`producto.plazo` field missing');
        $this->assertTrue(isset($data->producto->montoMaxInversion), '`producto.montoMaxInversion` field missing');
        $this->assertTrue(isset($data->producto->requisitosIngresosMinimos), '`producto.requisitosIngresosMinimos` field missing');
        $this->assertTrue(isset($data->producto->garantias), '`producto.garantias` field missing');
        $this->assertTrue(isset($data->producto->costosAdicionales), '`producto.costosAdicionales` field missing');
        $this->assertTrue(isset($data->producto->beneficiosAdicionales), '`producto.beneficiosAdicionales` field missing');
        $this->assertTrue(isset($data->producto->tipoProducto), '`producto.tipoProducto` field missing');
    }

    public function testUnsuccesfulGet(): void
    {
        $client = static::createClient();
        $crawler = $client->jsonRequest('GET', '/api/getUserData');

        $this->assertNotEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
