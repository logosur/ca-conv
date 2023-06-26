<?php

namespace App\Controller;

use App\Entity\Ciudad;
use App\Entity\User;
use App\Transformer\UserTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class UserApiController extends AbstractController
{
    #[Route('/api/user', name: 'app_api_user_edit', methods: ['PUT'])]
    public function edit(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        #[CurrentUser] ?User $user
    ): Response
    {
        $content = [];
        $contentRaw = $request->getContent();
        parse_str($contentRaw, $content);

        $ciudad = $entityManager->getRepository(Ciudad::class)->find($content['ciudad']);
        
        $user->setNombre($content['nombre']);
        $user->setApellido($content['apellido']);
        $user->setEmail($content['email']);
        $user->setEdad($content['edad']);
        $user->setCiudad($ciudad);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'result'  => 'ok',
        ]);
    }
}
