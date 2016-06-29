<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $name = 'Valentin';

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('proshop.tech.mail@gmail.com')
            ->setTo('manugorre@gmail.com')
            ->setBody(
                $this->renderView(
                    'emails/registration.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
        ;

        $this->get('mailer')->send($message);

        return $this->render('front/index.html.twig', []);
    }
}
