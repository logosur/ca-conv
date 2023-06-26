<?php

namespace App\Controller\Admin;

use App\Entity\ProductoFinanciero;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductoFinancieroCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductoFinanciero::class;
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
