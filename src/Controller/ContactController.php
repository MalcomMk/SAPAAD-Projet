<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        // $form=$this->createform(ContactType::class);
        // $form->handleRequest($request);
        // if($form->isSubmitted()){
        //     $data=$form->getData();
        //     $nom=$data["nom"];
        //     $prenom=$data["prenom"];
        //     $email=$data["mail"];
        //     return $this->render("contact/Success.html.twig");
        

        $form=$this->createform(ContactType::class);
        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire'=> $form
        ]);
    }
}
