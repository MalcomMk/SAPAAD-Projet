<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\Devis;
use App\Form\DemandeType;
use App\Form\Devis1Type;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\Constraint\IsEmpty;
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
     * @Route("/", name="user_devis_index")
     */
    public function index(Request $request ,DevisRepository $devisRepository, ManagerRegistry $doctrine): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class,$demande);
        $form->handleRequest($request);
        $entityManager = $doctrine->getManager();
     
        if ($form->isSubmitted() && $form->isValid()) {
            $dt = new DateTime();
            $demande->setDateDemande($dt);
            $demande->setUser($this->getUser());
            
            if($form["details"]->getData() === null)
            {
                $demande->setStatus(0);
            }else{
                $demande->setStatus(1);
            }
            
            
            $entityManager->persist($demande);
        
            $entityManager->flush();
      
            //return $this->redirectToRoute('task_success');
        }



        return $this->render('user_devis/index.html.twig', [
            'devis' => $devisRepository->findAll(),
            'form'=> $form->createView()
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
