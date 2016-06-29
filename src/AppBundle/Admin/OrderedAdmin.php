<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderedAdmin extends AbstractAdmin
{
    private $statusChoices = [
        0 => 'Commande en attente',
        1 => 'Demande envoyée',
        2 => 'Demande acceptée',
        3 => 'Facture disponible',
    ];

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('comment', null, ['label' => 'Commentaire'])
            ->add('status', 'choice', ['label' => 'Statut', 'choices' => $this->statusChoices])
            ->add('createdAt', null, ['label' => 'Crée le'])
            ->add('updatedAt', null, ['label' => 'Modifié le'])
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('orderedItems','sonata_type_collection',
                [
                    'by_reference' => false,
                    'label' => false,
                    'type_options' => ['delete' => true],
                    'btn_add' => 'Ajouter un article',
                    'required' => false
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table'
                ])
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
            ->add('orderedItems', null, ['label' => 'Articles'])
            ->add('createdAt', null, ['label' => 'Crée le'])
            ->add('updatedAt', null, ['label' => 'Modifié le'])
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
