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

    public function sendEmail($templateName, $subject, $data=[])
    {
        $body = $this->renderTemplate($templateName, $data);

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom(array('team@proshop.tech' => 'L\'équipe Proshop'))
            ->setTo('txreplay@gmail.com')
            ->setBody($body, 'text/html')
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