<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BudgetAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('type', null, ['label' => 'Type'])
            ->add('value', null, ['label' => 'Valeur'])
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
            ->add('value', null, ['label' => 'Valeur', 'help' => ''])
            ->add('type', null, ['label' => 'Type', 'help' => ''])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('type', null, ['label' => 'Type'])
            ->add('value', null, ['label' => 'Valeur'])
            ->add('createdAt', null, ['label' => 'Créé le'])
            ->add('updatedAt', null, ['label' => 'Modifié le'])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('value', null, ['label' => 'Valeur'])
            ->add('type', null, ['label' => 'Type'])
        ;
    }
}
