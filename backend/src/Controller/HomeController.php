<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserData;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(UserData $userData): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $data = $userData->get();
        dump($data[0]->getRecomendacion()->getProducto()); exit();
        return $this->render('home/index.html.twig', [
            'chats' => $data
        ]);
    }
}
