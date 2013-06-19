<?php

namespace Site\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordering
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\DBBundle\Entity\OrderingRepository")
 */
class Ordering  extends BaseEntity
{
    const STATE_DRAFT = "draft";
    const STATE_PENDING = "pending";
    const STATE_DELIVERED = "delivered";
    const STATE_CANCELED = "canceled";

    protected $states = [
        self::STATE_DRAFT=>"brouillon",
        self::STATE_PENDING=>"en cours",
        self::STATE_DELIVERED=>"livrée",
        self::STATE_CANCELED=>"annulée",
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
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="sendAt", type="string", length=255)
     */
    private $sendAt;

    /**
     * @var string
     *
     * @ORM\Column(name="deliveredAt", type="string", length=255)
     */
    private $deliveredAt;

    /**
     * @var string
     *
     * @ORM\Column(name="canceledAt", type="string", length=255)
     */
    private $canceledAt;

    /**
     * @ORM\Column(name="archived", type="boolean")
     */
    private $archived;


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
     * Set ref
     *
     * @param string $ref
     * @return Ordering
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Ordering
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Ordering
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt->setTimezone(new \DateTimeZone($this->timezone));
    }

    public function getCreatedAtIso8601()
    {
        return $this->createdAt->format(\DateTime::ISO8601);
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Ordering
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

    /**
     * Set sendAt
     *
     * @param string $sendAt
     * @return Ordering
     */
    public function setSendAt($sendAt)
    {
        if($sendAt instanceof \DateTime){
            $sendAt->setTimezone(new \DateTimeZone($this->timezone));
            $sendAt = $sendAt->format($this->dateFormat);
        }
        $this->sendAt = $sendAt;

        return $this;
    }

    /**
     * Get sendAt
     *
     * @return string
     */
    public function getSendAt()
    {
        return $this->sendAt;
    }

    public function getSendAtIso8601()
    {
        $date = new \DateTime($this->getSendAt(), new \DateTimeZone($this->timezone));
        return $date->format(\DateTime::ISO8601);
    }

    public function getSendAtToDateTime()
    {
        $date = new \DateTime($this->getSendAt(), new \DateTimeZone($this->timezone));
        return $date;
    }

    /**
     * Set deliveredAt
     *
     * @param string $deliveredAt
     * @return Ordering
     */
    public function setDeliveredAt($deliveredAt)
    {
        if($deliveredAt instanceof \DateTime){
            $deliveredAt->setTimezone(new \DateTimeZone($this->timezone));
            $deliveredAt = $deliveredAt->format($this->dateFormat);
        }
        $this->deliveredAt = $deliveredAt;

        return $this;
    }

    /**
     * Get deliveredAt
     *
     * @return string
     */
    public function getDeliveredAt()
    {

        return $this->deliveredAt;
    }

    public function getDeliveredAtIso8601()
    {
        $date = new \DateTime($this->getDeliveredAt(), new \DateTimeZone($this->timezone));
        return $date->format(\DateTime::ISO8601);
    }

    public function geDeliveredAtToDateTime()
    {
        $date = new \DateTime($this->getDeliveredAt(), new \DateTimeZone($this->timezone));
        return $date;
    }

    /**
     * Set canceledAt
     *
     * @param string $canceledAt
     * @return Ordering
     */
    public function setCanceledAt($canceledAt)
    {
        if($canceledAt instanceof \DateTime){
            $canceledAt->setTimezone(new \DateTimeZone($this->timezone));
            $canceledAt = $canceledAt->format($this->dateFormat);
        }
        $this->canceledAt = $canceledAt;

        return $this;
    }

    /**
     * Get canceledAt
     *
     * @return string
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    public function getCanceledAtIso8601()
    {
        $date = new \DateTime($this->getCanceledAt(), new \DateTimeZone($this->timezone));
        return $date->format(\DateTime::ISO8601);
    }

    public function getCanceledAtToDateTime()
    {
        $date = new \DateTime($this->getCanceledAt(), new \DateTimeZone($this->timezone));
        return $date;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param mixed $archived
     * @return $this
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
        return $this;
    }

    public function getStates()
    {
        return $this->states;
    }
}