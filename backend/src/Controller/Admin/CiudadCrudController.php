<?php

namespace App\Controller\Admin;

use App\Entity\Ciudad;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CiudadCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ciudad::class;
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
