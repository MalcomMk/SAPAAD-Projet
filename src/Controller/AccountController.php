<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AccountType;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }
    #[Route('/account', name: 'account')]
    public function index(Request $request): Response
    {
        $user = $this->entityManager->getRepository(User::class)->find($this->getUser()->getId());
        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }
        $form=$this->createform(AccountType::class,$user );
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form ->isValid() ) {
            $this->entityManager->persist($form->getData());
            $this->entityManager->flush();
           /* $data = $form->getData();
            $user->setNom($data["nom"]);
            $user->setPrenom($data["prenom"]);
            $user->setEmail($data["email"]);
            $user->setAdress($data["adress"]);*/

        }
        return $this->renderForm('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'form' => $form,
            'user' => $user,
        ]);
    }
}
