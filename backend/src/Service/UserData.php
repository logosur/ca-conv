<?php

namespace App\Service;

use App\Entity\ChatSession;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use App\Entity\User;
use App\Entity\Recomendacion;
use Symfony\Component\Security\Core\Security;

class UserData
{
    private ?User $user;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->user = $security->getUser();
        $this->entityManager = $entityManager;
    }

    public function get()
    {
       return $this->entityManager->getRepository(ChatSession::class)->findBy(['usuario' => $this->user->getId()]);
    }
}