<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CurriculumItemRelUser
 *
 * @ORM\Table(name="curriculum_item_rel_user")
 * @ORM\Entity(repositoryClass="Entity\Repository\CurriculumItemRelUserRepository")
 */
class CurriculumItemRelUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $userId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="order_id", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="curriculumItems")
     */
    //private $user;

    /**
     * @ORM\ManyToOne(targetEntity="User"))
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", nullable=true)
     */
    private $user;

     /**
     * @ORM\ManyToOne(targetEntity="CurriculumItem")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id", nullable=true)
     */
    private $item;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param CurriculumItem $item
     */
    public function setItem(CurriculumItem $item)
    {
        $this->item = $item;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
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
     * Set itemId
     *
     * @param integer $itemId
     * @return CurriculumItemRelUser
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return CurriculumItemRelUser
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set orderId
     *
     * @param boolean $orderId
     * @return CurriculumItemRelUser
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return boolean
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CurriculumItemRelUser
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
}
