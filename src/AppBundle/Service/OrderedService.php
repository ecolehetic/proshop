<?php

namespace AppBundle\Service;

use AppBundle\Entity\Ordered;
use Doctrine\ORM\EntityManager;

class OrderedService
{
    protected $em;
    protected $twig;
    protected $mailer;

    public function __construct(EntityManager $em, \Twig_Environment $twig, \Swift_Mailer $mailer)
    {
        $this->em = $em;
        $this->twig = $twig;
        $this->mailer = $mailer;
    }

    public function loadOrdered($OrderedId)
    {
        return $this->getRepository()->findOneBy(['id' => $OrderedId]);
    }

    public function saveOrdered(Ordered $ordered)
    {
        $this->persistAndFlush($ordered);
    }

    public function sendEmail($templateName, $data=[])
    {
        $body = $this->renderTemplate($templateName, $data);

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('steve@proshop.tech')
            ->setTo('txreplay@gmail.com')
            ->setBody($body)
        ;

        $this->mailer->send($message);
    }

    public function renderTemplate($templateName, $data=[])
    {
        return $this->twig->render('emails/'.$templateName.'.html.twig', $data);
    }

    protected function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function getRepository()
    {
        return $this->em->getRepository('AppBundle:Ordered');
    }
}