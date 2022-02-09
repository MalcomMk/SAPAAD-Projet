<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\Service1Type;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/catalog")
 */
class CatalogController extends AbstractController
{
    /**
     * @Route("/", name="catalog_index", methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('catalog/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

   

    /**
     * @Route("/{id}", name="catalog_show", methods={"GET"})
     */
    public function show(Service $service): Response
    {
        return $this->render('catalog/show.html.twig', [
            'service' => $service,
        ]);
    }

}