<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\Demande1Type;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/demande")
 */
class UserDemandeController extends AbstractController
{
    /**
     * @Route("/", name="user_demande_index", methods={"GET"})
     */
    public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('user_demande/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_demande_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $demande = new Demande();
        $form = $this->createForm(Demande1Type::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($demande);
            $entityManager->flush();

            return $this->redirectToRoute('user_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_demande_show", methods={"GET"})
     */
    public function show(Demande $demande): Response
    {
        return $this->render('user_demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_demande_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Demande $demande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Demande1Type::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_demande_delete", methods={"POST"})
     */
    public function delete(Request $request, Demande $demande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($demande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_demande_index', [], Response::HTTP_SEE_OTHER);
    }
}
