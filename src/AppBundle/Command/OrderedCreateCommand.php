<?php

namespace AppBundle\Command;

use AppBundle\Entity\Ordered;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderedCreateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('proshop:mail:create')
            ->setDescription('Envois un mail lorsqu\'une commande a été créée.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();


        try {
            // On récupère toutes les commandes créées avec le status 0
            $ordereds = $em->getRepository('AppBundle:Ordered')->findBy(['status' => 0]);

            foreach ($ordereds as $ordered){
                var_dump($ordered->getComment());
            }

            $output->writeln('Success');
        } catch (Exception $e) {
            $output->writeln('Error');
        }
    }
}