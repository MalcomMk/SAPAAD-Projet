<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer ): Response
    {
        $form=$this->createform(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form ->isValid() ){
            $data=$form->getData();
            $email=$data["email"];
            $message=$data["message"];
            // src/Controller/MailerController.php

        $email = (new Email())
	    ->from($email)
		->to('newuser@example.com')
		->subject('Best practices of building HTML emails')
        ->text($message);
  

             $mailer->send($email);
            // dd($data); 
            return $this->render("contact/Success.html.twig");
        
        }
       
        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire'=> $form
        ]);
    }
}
