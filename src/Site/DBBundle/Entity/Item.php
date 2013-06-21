<?php

namespace Site\DBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Item
 *
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass="Site\DBBundle\Entity\ItemRepository")
 */
class Item extends BaseEntity
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="packaging", type="string", length=255, nullable=true)
     */
    private $packaging;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Site\DBBundle\Entity\Category", inversedBy="items")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Site\DBBundle\Entity\OrderedItem", mappedBy="item")
     */
    protected $itemOrderings;

    /**
     * @ORM\OneToMany(targetEntity="Site\DBBundle\Entity\Bookmark", mappedBy="item")
     */
    protected $users;

    public function __construct()
    {
        $this->itemOrderings = new ArrayCollection();
        $this->users = new ArrayCollection();
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
     * @return Item
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
     * Set weight
     *
     * @param float $weight
     * @return Item
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set packaging
     *
     * @param string $packaging
     * @return Item
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * Get packaging
     *
     * @return string
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Item
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set category
     *
     * @param Category $category
     * @return Item
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add itemOrderings
     *
     * @param OrderedItem $itemOrderings
     * @return Item
     */
    public function addItemOrdering(OrderedItem $itemOrderings)
    {
        $this->itemOrderings[] = $itemOrderings;

        return $this;
    }

    /**
     * Remove itemOrderings
     *
     * @param OrderedItem $itemOrderings
     */
    public function removeItemOrdering(OrderedItem $itemOrderings)
    {
        $this->itemOrderings->removeElement($itemOrderings);
    }

    /**
     * Get itemOrderings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItemOrderings()
    {
        return $this->itemOrderings;
    }

    /**
     * Add users
     *
     * @param Bookmark $users
     * @return Item
     */
    public function addUser(Bookmark $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param Bookmark $users
     */
    public function removeUser(Bookmark $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
