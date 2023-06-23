<?php

namespace App\Controller;

use App\Service\UserData;
use App\Transformer\UserDataTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDataApiController extends AbstractController
{
    #[Route('/api/getUserData', name: 'app_api_get_user_data')]
    public function index(UserData $userData, UserDataTransformer $userDataTransformer): Response
    {
        $data = $userData->get();
        
        $result = $userDataTransformer->transform($data);
        
        return $this->json([
            'data'  => $result,
        ]);
    }
}
