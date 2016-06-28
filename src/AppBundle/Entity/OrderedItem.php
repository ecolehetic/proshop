<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * OrderedItem
 *
 * @ORM\Table(name="ordered_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderedItemRepository")
 */
class OrderedItem
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var $ordered
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ordered", inversedBy="OrderedItems")
     * @ORM\JoinColumn(name="ordered_id", referencedColumnName="id" , nullable = false)
     */
    private $ordered;

    /**
     * @var $product
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @return string
     */
    public function __toString()
    {
        return ((string)$this->getId()) ? : '';
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
     * Set price
     *
     * @param float $price
     * @return OrderedItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return OrderedItem
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set order
     *
     * @param Ordered $ordered
     * @return OrderedItem
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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return OrderedItem
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
