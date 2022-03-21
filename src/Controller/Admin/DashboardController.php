<?php

namespace App\Controller\Admin;

use App\Entity\Demande;
use App\Entity\Devis;
use App\Entity\Intervenant;
use App\Entity\Service;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());

        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            //->setTitle('SAPAAD Projet')
            ->setTitle('<img src="images/Logo_V2_copie.png">')
            ->setFaviconPath('http://localhost.fr');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Demande', 'fas fa-list', Demande::class);
        yield MenuItem::linkToCrud('Devis', 'fas fa-list', Devis::class);
        yield MenuItem::linkToCrud('Intervenant', 'fas fa-list', Intervenant::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
        
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
