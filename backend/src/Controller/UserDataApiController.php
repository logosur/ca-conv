<?php

namespace App\Controller;

use App\Entity\Ciudad;
use App\Service\UserData;
use App\Transformer\UserDataTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDataApiController extends AbstractController
{
    /*
     * Api para obtener los datos de financiacón del usuario en versión frontend SPA.
     */
    #[Route('/api/getUserData', name: 'app_api_get_user_data')]
    public function index(UserData $userData, UserDataTransformer $userDataTransformer): Response
    {
        $data = $userData->get();
        $result = $userDataTransformer->toDTO($data);
        
        return $this->json([
            'data'  => $result,
        ]);
    }

    /*
     * Api para obtener los datos de ciudades para formularios, en versión frontend SPA.
     */
    #[Route('/api/getCiudadForm', name: 'app_api_get_ciudad_form')]
    public function getCiudad(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(Ciudad::class)->findAll();
        
        return $this->json([
            'data'  => $result,
        ]);
    }
}
