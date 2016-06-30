<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class OrderedAdmin extends AbstractAdmin
{
    private $statusChoices = [
        0 => 'Commande en attente',
        1 => 'Demande envoyée',
        2 => 'Demande acceptée',
        3 => 'Facture disponible',
    ];

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('accept', $this->getRouterIdParameter().'/accept',
                [
                    '_controller' => 'AppBundle:CRUD:accept'
                ])
            ->add('refuse', $this->getRouterIdParameter().'/refuse',
                [
                    '_controller' => 'AppBundle:CRUD:accept'
                ])
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        if($this->getConfigurationPool()->getContainer()->get('security.context')->isGranted('ROLE_ADMIN')) {
            $actions =
                [
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'accept' => array(
                        'template' => 'admin/CRUD/list__action_accept.html.twig'
                    ),
                    'refuse' => array(
                        'template' => 'admin/CRUD/list__action_refuse.html.twig'
                    )

                ];
        }
        else {
            $actions =
                [
                    'show' => array(),
                ];
        }

        $listMapper
            ->add('comment', null, ['label' => 'Commentaire'])
            ->add('status', 'choice', ['label' => 'Statut', 'choices' => $this->statusChoices])
            ->add('createdAt', null, ['label' => 'Crée le'])
            ->add('updatedAt', null, ['label' => 'Modifié le'])
            ->add('_action', null, array(
                'actions' => $actions
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //TODO: Faire la jointure dans l'autre sens. Product vers OrderedItem
        $formMapper
            ->add('orderedItems','sonata_type_model', ['label' => 'Produit', 'multiple' => true])
            ->add('comment', null, ['label' => 'Commentaire'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('comment', null, ['label' => 'Commentaire'])
            ->add('status', null, ['label' => 'Statut'])
            ->add('createdAt', null, ['label' => 'Crée le'])
            ->add('updatedAt', null, ['label' => 'Modifié le'])
            ->add('articles', null,
                [
                    'label' => 'Articles',
                    'template' => 'admin/order/item.html.twig'
                ])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('comment', null, ['label' => 'Commentaire'])
            ->add('status', null, ['label' => 'Statut'])
        ;
    }
}
