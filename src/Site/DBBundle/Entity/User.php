<?php

namespace Site\DBBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Site\DBBundle\Entity\UserRepository")
 */
class User
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;


    /**
     * @ORM\OneToMany(targetEntity="Site\DBBundle\Entity\Bookmark", mappedBy="user")
     */
    protected $bookmarkedItems;

    public function __construct()
    {
        $this->bookmarkedItems = new ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Add bookmarkedItems
     *
     * @param Bookmark $bookmarkedItems
     * @return User
     */
    public function addBookmarkedItem(Bookmark $bookmarkedItems)
    {
        $this->bookmarkedItems[] = $bookmarkedItems;

        return $this;
    }

    /**
     * Remove bookmarkedItems
     *
     * @param Bookmark $bookmarkedItems
     */
    public function removeBookmarkedItem(Bookmark $bookmarkedItems)
    {
        $this->bookmarkedItems->removeElement($bookmarkedItems);
    }

    /**
     * Get bookmarkedItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookmarkedItems()
    {
        return $this->bookmarkedItems;
    }
}
