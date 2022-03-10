<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            TextField::new('nom'),
            TextField::new('prenom'),
            ChoiceField::new('roles')
                ->setChoices([
                'ROLE_ADMIN'=>'ROLE_ADMIN',
                'ROLE_USER'=>'ROLE_USER',
                'ROLE_INTERVENANT'=>'ROLE_INTERVENANT'
            ])
                ->allowMultipleChoices(),
            TextField::new('password'),
            TextField::new('adresse'),
            AssociationField::new('intervenant')->setCrudController(IntervenantCrudController::class),
           
        ];
    }

}
