<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\Devis1Type;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/devis")
 */
class UserDevisController extends AbstractController
{
    /**
     * @Route("/", name="user_devis_index", methods={"GET"})
     */
    public function index(DevisRepository $devisRepository): Response
    {
        return $this->render('user_devis/index.html.twig', [
            'devis' => $devisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_devis_show", methods={"GET"})
     */
    public function show(Devis $devi): Response
    {
        return $this->render('user_devis/show.html.twig', [
            'devi' => $devi,
        ]);
    }

    

    
}
