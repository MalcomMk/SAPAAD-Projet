<?php

namespace App\Controller\Admin;

use App\Entity\Intervenant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IntervenantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Intervenant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('metier'),
            AssociationField::new('demandes')->setCrudController(DemandeCrudController::class),
            AssociationField::new('user')->setCrudController(UserCrudController::class),
        ];
    }
    
}
