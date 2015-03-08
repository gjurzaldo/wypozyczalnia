<?php

namespace pp5\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */
class Order
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="orders")
     */
    private $movie;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     */
    private $user;


    /**
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;


    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;

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
     * @param string $price
     * @return Order
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set movie
     *
     * @param \pp5\ShopBundle\Entity\Movie $movie
     * @return Order
     */
    public function setMovie(\pp5\ShopBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \pp5\ShopBundle\Entity\Movie 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set user
     *
     * @param \pp5\ShopBundle\Entity\User $user
     * @return Order
     */
    public function setUser(\pp5\ShopBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \pp5\ShopBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
