<?php

namespace App\Transformer;

use App\DTO\UserDTO;
use App\Entity\User;

class UserTransformer
{
    public function toDTO(User $user): UserDTO
    {
        $userDto = new UserDTO();
        $userDto->setUsername($user->getUsername());
        $userDto->setEmail($user->getEmail());
        $userDto->setNombre($user->getNombre());
        $userDto->setApellido($user->getApellido());
        $userDto->setEdad($user->getEdad());
        $userDto->setCiudad($user->getCiudad());
        $userDto->setCiudadId($user->getCiudad()->getId());             

        return $userDto;
    }

    public function fromDTO(UserDTO $userDTO): User
    {
        $user = new User();
        $user->setUsername($userDTO->getUsername());
        $user->setEmail($userDTO->getEmail());
        $user->setNombre($userDTO->getNombre());
        $user->setApellido($userDTO->getApellido());
        $user->setEdad($userDTO->getEdad());
        $user->setCiudad($userDTO->getCiudad());
        

        return $user;
    }
}