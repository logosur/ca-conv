<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use App\Transformer\UserTransformer;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function index(#[CurrentUser] ?User $user): Response
    {
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = 'xxx';

        return $this->json([
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }

    /*
     * Api de control de sesión de authentificación por token para frontend.
     */
    #[Route('/api/me', name: 'api_me')]
    public function me(#[CurrentUser] ?User $user, UserTransformer $userTransformer): Response
    {
        if (null === $user) {
            return $this->json([
                'message' => 'Not logged in.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $userDTO = $userTransformer->toDTO($user);

        return $this->json([
            'result'  => 'ok',
            'user' => $userDTO
        ]);
    }
}