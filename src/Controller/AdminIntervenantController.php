<?php

namespace App\Controller;

use App\Entity\Intervenant;
use App\Form\IntervenantType;
use App\Repository\IntervenantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/intervenant")
 */
class AdminIntervenantController extends AbstractController
{
    /**
     * @Route("/", name="admin_intervenant_index", methods={"GET"})
     */
    public function index(IntervenantRepository $intervenantRepository): Response
    {
        return $this->render('admin_intervenant/index.html.twig', [
            'intervenants' => $intervenantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_intervenant_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $intervenant = new Intervenant();
        $form = $this->createForm(IntervenantType::class, $intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($intervenant);
            $entityManager->flush();

            return $this->redirectToRoute('admin_intervenant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_intervenant/new.html.twig', [
            'intervenant' => $intervenant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_intervenant_show", methods={"GET"})
     */
    public function show(Intervenant $intervenant): Response
    {
        return $this->render('admin_intervenant/show.html.twig', [
            'intervenant' => $intervenant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_intervenant_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Intervenant $intervenant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IntervenantType::class, $intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_intervenant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_intervenant/edit.html.twig', [
            'intervenant' => $intervenant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_intervenant_delete", methods={"POST"})
     */
    public function delete(Request $request, Intervenant $intervenant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intervenant->getId(), $request->request->get('_token'))) {
            $entityManager->remove($intervenant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_intervenant_index', [], Response::HTTP_SEE_OTHER);
    }
}
