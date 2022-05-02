<?php

namespace App\Command;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'sapaad:init:service', description: 'Add a short description for your command')]
class SapaadInitServiceCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $lines = file('service.csv');
        foreach ($lines as $row){
            $result = explode(';',trim($row));
            dump($result);

            $nom = $result[1];
            $description = $result[2];
            $illustration = $result[3];
            $shortcut_name = $result[4];

            $service = new Service();
            $service->setNom($nom);
            $service->setDescription($description);
            $service->setIllustration($illustration);
            $service->setShortcutName($shortcut_name);

            $this->entityManager->persist($service);
            $this->entityManager->flush();
        }
        
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
