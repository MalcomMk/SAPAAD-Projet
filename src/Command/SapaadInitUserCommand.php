<?php

namespace App\Command;

use App\Entity\Intervenant;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'sapaad:init:user',
    description: 'Add a short description for your command',
)]
class SapaadInitUserCommand extends Command
{
    private $passwordHasher;
    private $entityManager;

    public function __construct(UserPasswordHasherInterface $passwordHasher,EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $users = [
            'admin'=>[
                'email'=>'admin@frosted.fr',
                'phone'=>'0694477595',
                'nom'=>'admin',
                'prenom'=>'ADMIN',
                'adresse'=>'Allee des Neuveries, 91190 Gif-sur-Yvette',
                'roles'=>['ROLE_ADMIN'],
                'password'=>'password'
            ],
            'user'=>[
                'email'=>'bamby@frosted.fr',
                'phone'=>'0694477594',
                'nom'=>'BAMBY',
                'prenom'=>'bamby',
                'adresse'=>'4 Rue du Docteur Morere,91120 Palaiseau',
                'roles'=>['ROLE_USER'],
                'password'=>'password'
            ],
            'intervenant'=>[
                'email'=>'intervenant@frosted.fr',
                'phone'=>'0694477591',
                'nom'=>'INTERVENANT',
                'prenom'=>'intervenant',
                'adresse'=>'8 Rue de la Gare, 91800	Brunoy',
                'roles'=>['ROLE_INTERVENANT'],
                'password'=>'password'
            ]
        ];
        foreach($users as $user){
            dump($user['email']);
            $userSapaad = new User();
            $userSapaad->setEmail($user['email']);
            $userSapaad->setNom($user['nom']);

            if($user['prenom'] === 'intervenant'){
                $intervenant = new Intervenant();
                $intervenant->setPrenom($user['prenom']);
                $intervenant->setNom($user['nom']);
                $intervenant->setMetier('aide à domicile');
                $userSapaad->setIntervenant($intervenant);
            }
            

            $userSapaad->setPrenom($user['prenom']);
            $userSapaad->setAdresse($user['adresse']);
            $userSapaad->setRoles($user['roles']);
            $plaintextPassword = $user['password'];

            $hashedPassword = $this->passwordHasher->hashPassword(
                $userSapaad,
                $plaintextPassword
            );
            $userSapaad->setPassword($hashedPassword);
            $this->entityManager->persist($userSapaad);
            $this->entityManager->flush();
        }
        



        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }

}
