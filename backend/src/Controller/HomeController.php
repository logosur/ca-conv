<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserData;

class HomeController extends AbstractController
{
    /*
     * Carga la view de la homepage para la versión frontend de Symfony/Twig.
     */
    #[Route('/', name: 'home')]
    public function index(UserData $userData): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $data = $userData->get();

        return $this->render('home/index.html.twig', [
            'chats' => $data
        ]);
    }
}
