<?php

namespace App\Controller\Admin;

use App\Entity\Recomendacion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecomendacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recomendacion::class;
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
