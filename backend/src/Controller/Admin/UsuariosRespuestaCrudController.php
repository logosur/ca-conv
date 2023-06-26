<?php

namespace App\Controller\Admin;

use App\Entity\UsuariosRespuesta;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsuariosRespuestaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UsuariosRespuesta::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
