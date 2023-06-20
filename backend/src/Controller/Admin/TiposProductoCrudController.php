<?php

namespace App\Controller\Admin;

use App\Entity\TiposProducto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TiposProductoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TiposProducto::class;
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
