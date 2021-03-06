<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderedItemAdmin extends AbstractAdmin
{

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('product', null, ['label' => 'Produit'])
            ->add('price', null, ['label' => 'Prix unitaire'])
            ->add('number', null, ['label' => 'Nombre'])
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
            ->add('product','sonata_type_model', ['label' => 'Produit'])
            ->add('number', null, ['label' => 'Nombre'])
            ->add('price', null, ['label' => 'Prix unitaire'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('price', null, ['label' => 'Prix unitaire'])
            ->add('number', null, ['label' => 'Nombre'])
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
            ->add('product', null, ['label' => 'Produit'])
            ->add('price', null, ['label' => 'Prix unitaire'])
            ->add('number', null, ['label' => 'Nombre'])
            ->add('ordered', null, ['label' => 'Commande'])
        ;
    }
}
