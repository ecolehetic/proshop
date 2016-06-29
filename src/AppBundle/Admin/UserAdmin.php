<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username', null, ['label' => 'Nom de compte'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Activé'])
            ->add('locked', null, ['label' => 'Bloqué'])
            ->add('roles', null, ['label' => 'Role'])
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
            ->add('username', null, ['label' => 'Nom de compte'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Activé'])
            ->add('locked', null, ['label' => 'BLoqué'])
            ->add('roles', null, ['label' => 'Role'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username', null, ['label' => 'Nom de compte'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Activé'])
            ->add('locked', null, ['label' => 'BLoqué'])
            ->add('roles', null, ['label' => 'Role'])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username', null, ['label' => 'Nom de compte'])
            ->add('email', null, ['label' => 'Email'])
            ->add('enabled', null, ['label' => 'Activé'])
            ->add('locked', null, ['label' => 'Bloqué'])
            ->add('roles',null, ['label' => 'Role'])
        ;
    }
}
