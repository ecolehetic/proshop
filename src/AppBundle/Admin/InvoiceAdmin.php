<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Invoice;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class InvoiceAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('filename', null, ['label' => 'Nom du fichier'])
            ->add('ordered', null, ['label' => 'Commande'])
            ->add('createdAt', null, ['label' => 'Crée le'])
            ->add('download', null,
                [
                    'label' => 'Télécharger le pdf',
                    'template' => 'admin/invoice/list_value.html.twig'
                ])
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
            ->add('ordered', null, ['label' => 'Commande'])
            ->add('file', 'file', ['label' => 'Fichier'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id', null, ['label' => 'ID'])
            ->add('filename', null, ['label' => 'Nom du Fichier'])
            ->add('ordered', null, ['label' => 'Commande'])
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
            ->add('filename', null, ['label' => 'Nom du fichier'])
            ->add('ordered', null, ['label' => 'Commande'])
        ;
    }

    /**
     * @param mixed $invoice
     * Call before persistance
     */
    public function prePersist($invoice) {
        $this->saveFile($invoice);
    }

    /**
     * @param mixed $invoice
     */
    public function preUpdate($invoice) {
        $this->saveFile($invoice);
    }

    /**
     * @param Invoice $invoice
     */
    public function saveFile(Invoice $invoice) {
        $basepath = $this->getRequest()->getBasePath();
        $invoice->upload($basepath);
    }
}
