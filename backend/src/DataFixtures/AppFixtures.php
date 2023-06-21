<?php

namespace App\DataFixtures;

use App\Entity\ChatPreguntas;
use App\Entity\ChatSession;
use App\Entity\User;
use App\Entity\Ciudad;
use App\Entity\TiposProducto;
use App\Entity\ProductoFinanciero;
use App\Entity\Pregunta;
use App\Entity\Recomendacion;
use App\Entity\UsuariosRespuesta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Uid\Uuid;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
       $this->passwordHasher = $passwordHasher; 
    }
    public function load(ObjectManager $manager)
    {
        $ciudad = new Ciudad();
        $ciudad->setCiudad('Sevilla');
        $manager->persist($ciudad);

        $ciudad = new Ciudad();
        $ciudad->setCiudad('Madrid');
        $manager->persist($ciudad);

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@adminmail435.org');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            '12345678'
        );
        $user->setPassword($hashedPassword);
        $user->setNombre('Admin user');
        $user->setApellido('apeadmin');
        $user->setEdad(30);
        $user->setCiudad($ciudad);
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($user);

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

        $usuariosRespuesta = new UsuariosRespuesta();
        $usuariosRespuesta->setPregunta($pregunta);
        $usuariosRespuesta->setUsuario($user);
        $usuariosRespuesta->setPregunta($pregunta);
        $usuariosRespuesta->setRespuesta("Respuesta 1");
        $usuariosRespuesta->setFecha(new DateTime());
        $manager->persist($usuariosRespuesta);

        $chatSesion = new ChatSession();
        $chatSesion->setCompletado(1);
        $chatSesion->setUsuario($user);
        $chatSesion->setFechaInicio(new DateTime());
        $chatSesion->setFechaModificacion(new DateTime());
        $manager->persist($chatSesion);

        $chatPregunta = new ChatPreguntas();
        $chatPregunta->setChat($chatSesion);
        $chatPregunta->setPregunta($pregunta);
        $chatPregunta->setRespuesta($usuariosRespuesta);
        $chatPregunta->setFecha(new DateTime());
        $manager->persist($chatPregunta);

        $recomendacion = new Recomendacion();
        $recomendacion->setUsuario($user);
        $recomendacion->setProducto($productoFinanciero);
        $recomendacion->setChat($chatSesion);
        $recomendacion->setFecha(new DateTime());
        $manager->persist($recomendacion);

        $chatSesion->setRecomendacion($recomendacion);
        $manager->persist($chatSesion);
        
        $manager->flush();
    }
}
