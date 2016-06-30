<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 29/06/16
 * Time: 17:10
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function acceptAction()
    {
        $object = $this->admin->getSubject();
        $this->container->get('ordered.service')->sendEmail('acceptOrder', 'Votre demande d\'achat a été validée !', ['ordered' => $object]);
        $object->setStatus(3);

        $this->updateAction($object);

        return new RedirectResponse($this->admin->generateUrl('list'));
    }

    /**
     * @return RedirectResponse
     */
    public function refusedAction()
    {
        $object = $this->admin->getSubject();
        $this->container->get('ordered.service')->sendEmail('denyOrder', 'Votre demande d\'achat a été refusée !', ['ordered' => $object]);
        $object->setStatus(0);

        $this->updateAction($object);

        return new RedirectResponse($this->admin->generateUrl('list'));
    }

    /**
     * @param $object
     */
    public function updateAction($object)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($object);
        $em->flush();
    }
}