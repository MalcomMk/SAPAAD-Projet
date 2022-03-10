<?php

namespace App\Controller\Admin;

use App\Entity\Devis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class DevisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Devis::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            MoneyField::new('prix')->setCurrency('EUR'),
            DateField::new('creation'),
            AssociationField::new('intervenants')->setCrudController(IntervenantCrudController::class),
            IntegerField::new('heure'),
            TextareaField::new('details'),
            AssociationField::new('services')->setCrudController(ServiceCrudController::class),
            AssociationField::new('user')->setCrudController(UserCrudController::class),
        ];
    }
    
}
