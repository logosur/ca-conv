<?php

namespace App\Controller\Admin;

use App\Entity\Pregunta;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PreguntaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pregunta::class;
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
