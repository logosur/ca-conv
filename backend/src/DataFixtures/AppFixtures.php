<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Ciudad;
use App\Entity\TiposProducto;
use App\Entity\ProductoFinanciero;
use App\Entity\Pregunta;
use App\Entity\UsuariosRespuesta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $usuarios = $manager->getRepository(User::class)->findAll();
        dump($usuarios);
        exit("aki");
        $ciudad = new Ciudad();
        $ciudad->setCiudad('Sevilla');
        $manager->persist($ciudad);

        $ciudad = new Ciudad();
        $ciudad->setCiudad('Madrid');
        $manager->persist($ciudad);

        $pregunta = new Pregunta();
        $pregunta->setTitulo('Título pregunta 1');
        $pregunta->setDescripcion('Descripción pregunta 1');
        $manager->persist($pregunta);

        $tiposProducto = new TiposProducto();
        $tiposProducto->setTipo('Tipo producto 1');
        $manager->persist($tiposProducto);

        $productoFinanciero = new ProductoFinanciero();
        $productoFinanciero->setTipoProducto($tiposProducto);
        $productoFinanciero->setNombre('Producto financiero 1');
        $productoFinanciero->setTasaInteres(11.05);
        $productoFinanciero->setPlazo(12);
        $productoFinanciero->setMontoMaxInversion(100.35);
        $productoFinanciero->setRequisitosIngresosMinimos(22.11);
        $productoFinanciero->setGarantias(33.22);
        $productoFinanciero->setCostosAdicionales(10.20);
        $productoFinanciero->setBeneficiosAdicionales(50.31);
        $manager->persist($productoFinanciero);

        $usuario = $manager->getRepository(User::class)->find(1);

        $usuariosRespuesta = new UsuariosRespuesta();
        $usuariosRespuesta->setPregunta($pregunta);
        $usuariosRespuesta->setUsuario($usuario[0]);


        $manager->flush();
    }
}
