<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Provider
 *
 * @ORM\Table(name="providers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="link_website", type="string", length=255, nullable=true)
     */
    private $linkWebsite;

    /**
     * @return string
     */
    public function __toString()
    {
        return ($this->name)? $this->name : 'Nouveau fournisseur';
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
     * Set name
     *
     * @param string $name
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set linkWebsite
     *
     * @param string $linkWebsite
     * @return Provider
     */
    public function setLinkWebsite($linkWebsite)
    {
        $this->linkWebsite = $linkWebsite;

        return $this;
    }

    /**
     * Get linkWebsite
     *
     * @return string 
     */
    public function getLinkWebsite()
    {
        return $this->linkWebsite;
    }
}
