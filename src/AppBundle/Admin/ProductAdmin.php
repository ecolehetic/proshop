<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('link', null, ['label' => 'Lien'])
            ->add('keywords', null, ['label' => 'Mots clé'])
            ->add('mark', null, ['label' => 'Marque'])
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
            ->add('name', null, ['label' => 'Nom'])
            ->add('link', null, ['label' => 'Lien'])
            ->add('keywords', null, ['label' => 'Mots clé'])
            ->add('mark', null, ['label' => 'Marque'])
            ->add('type', null, ['label' => 'Type'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('name', null, ['label' => 'Nom'])
            ->add('link', null, ['label' => 'Lien'])
            ->add('keywords', null, ['label' => 'Mots Clé'])
            ->add('mark', null, ['label' => 'Marque'])
            ->add('type', null, ['label' => 'Type'])
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
            ->add('name')
            ->add('link')
            ->add('keywords')
            ->add('mark')
            ->add('type')
        ;
    }
}
