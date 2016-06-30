<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Ordered
 *
 * @ORM\Table(name="ordered")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderedRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Ordered
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
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 1;

    /**
     * @var ArrayCollection $orderedItems
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderedItem", mappedBy="ordered", cascade={"all"})
     */
    private $orderedItems;

    /**
     * @return string
     */
    public function __toString()
    {
        return ('Commande n° ' . $this->getId()) ? : 'Nouvelle commande';
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
     * Set comment
     *
     * @param string $comment
     * @return Ordered
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Ordered
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getStringStatus()
    {
        switch($this->status) {
            case 0 : return ['status' => 'Commande refusée', 'label' => 'danger']; break;
            case 1 : return ['status' => 'Demande crée', 'label' => 'default']; break;
            case 2 : return ['status' => 'Demande envoyée', 'label' => 'primary']; break;
            case 3 : return ['status' => 'Demande acceptée', 'label' => 'success']; break;
            case 4 : return ['status' => 'Facture disponible', 'label' => 'info']; break;
            default: return ['status' => 'Commande en attente', 'label' => 'warning']; break;
        }
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderedItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orderedItems
     *
     * @param OrderedItem $orderedItem
     * @return Ordered
     */
    public function addOrderedItem(OrderedItem $orderedItem)
    {
        $orderedItem->setOrdered($this);
        $this->orderedItems->add($orderedItem);
    }

    /**
     * Remove orderedItems
     *
     * @param OrderedItem $orderedItem
     */
    public function removeOrderedItem(OrderedItem $orderedItem)
    {
        $orderedItem->unsetOrdered();
        $this->orderedItems->removeElement($orderedItem);
    }

    /**
     * Get orderedItem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderedItems()
    {
        return $this->orderedItems;
    }
}
