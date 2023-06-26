<?php

namespace App\Controller\Admin;

use App\Entity\ChatSession;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChatSessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChatSession::class;
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
