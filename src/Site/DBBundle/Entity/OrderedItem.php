<?php

namespace Site\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * OrderedItem
 *
 * @ORM\Table(name="orders_to_items")
 * @ORM\Entity(repositoryClass="Site\DBBundle\Entity\OrderedItemRepository")
 */
class OrderedItem extends BaseEntity
{
    const STATE_PENDING = "pending";
    const STATE_DELIVERED = "delivered";
    const STATE_MISSING = "missing";
    const STATE_REMOVED = "removed";

    protected $states = [
        self::STATE_PENDING => "à venir",
        self::STATE_DELIVERED => "livré",
        self::STATE_MISSING => "manquant",
        self::STATE_REMOVED => "retiré",
    ];
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="totalWeight", type="float", nullable=true)
     */
    private $totalWeight;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;


    /**
     * @ORM\ManyToOne(targetEntity="Site\DBBundle\Entity\Ordering", inversedBy="orderedItems")
     * @ORM\JoinColumn(name="ordering_id", referencedColumnName="id")
     */
    protected $ordering;

    /**
     * @ORM\ManyToOne(targetEntity="Site\DBBundle\Entity\Item", inversedBy="itemOrderings")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     */
    protected $item;

    public function __construct()
    {
        $this->state = self::STATE_PENDING;

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
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderedItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set totalWeight
     *
     * @param float $totalWeight
     * @return OrderedItem
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    /**
     * Get totalWeight
     *
     * @return float
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return OrderedItem
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    public function getStates()
    {
        return $this->states;
    }

    /**
     * Set ordering
     *
     * @param Ordering $ordering
     * @return OrderedItem
     */
    public function setOrdering(Ordering $ordering = null)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return Ordering
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set item
     *
     * @param Item $item
     * @return OrderedItem
     */
    public function setItem(Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }
}
