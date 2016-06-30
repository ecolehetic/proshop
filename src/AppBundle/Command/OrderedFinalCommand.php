<?php

namespace AppBundle\Command;

use AppBundle\Entity\Ordered;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderedFinalCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('proshop:mail:final')
            ->setDescription('Envois un mail lorsqu\'une commande a été validée ou refusée.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        try {
            // On récupère toutes les commandes créées avec le status 1
            $ordereds = $em->getRepository('AppBundle:Ordered')->findBy(['status' => 1]);

            foreach ($ordereds as $ordered){
                $ordered->setStatus(0);
                $em->persist($ordered);

            }
            $em->flush();

            $output->writeln('Success');
        } catch (Exception $e) {
            $output->writeln('Error');
        }
    }
}