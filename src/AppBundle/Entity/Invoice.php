<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints as Assert;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * @var $file
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Veulliez uploader un fichier PDF")
     */
    private $file;

    /**
     * @var $ordered
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ordered")
     * @ORM\JoinColumn(name="ordered_id", referencedColumnName="id")
     */
    private $ordered;

    /**
     * @return string
     */
    public function __toString()
    {
        return ($this->filename)? $this->filename : 'Nouvelle facture';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return Invoice
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set ordered
     *
     * @param Ordered $ordered
     * @return Invoice
     */
    public function setOrdered(Ordered $ordered = null)
    {
        $this->ordered = $ordered;

        return $this;
    }

    /**
     * Get ordered
     *
     * @return \AppBundle\Entity\Ordered 
     */
    public function getOrdered()
    {
        return $this->ordered;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Invoice
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return null|string
     */
    public function getAbsolutePath()
    {
        return null === $this->filename ? null : $this->getUploadRootDir().'/'.$this->filename;
    }

    /**
     * @return null|string
     */
    public function getWebPath()
    {
        return null === $this->filename ? null : $this->getUploadDir().'/'.$this->filename;
    }

    /**
     * @param $basepath
     * @return string
     */
    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    /**
     * @return string
     */
    protected function getUploadDir()
    {
        // get __DIR__
        return 'uploads/factures';
    }

    /**
     * @param $basepath
     */
    public function upload($basepath)
    {
        if (null === $this->file) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // Move file on uploadDir
        $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

        // Set the filename field with filename of the file
        $this->setFilename($this->file->getClientOriginalName());

        $this->file = null;
    }
}
