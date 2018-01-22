<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=30)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=30)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_adress", type="text")
     */
    private $postalAdress;

    /**
     * @var array
     *
     * @ORM\Column(name="visited_by", type="array")
     */
    private $visitedBy;

    /**
     * @var array
     *
     * @ORM\Column(name="blocked", type="array")
     */
    private $blocked;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var bool
     *
     * @ORM\Column(name="offline_mod", type="boolean")
     */
    private $offlineMod;

    /**
     * @ORM\OneToMany(targetEntity="User_Comment", mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="User_Comment", mappedBy="author")
     */
    private $user_comments;

    /**
     * @ORM\OneToMany(targetEntity="Product_Comment", mappedBy="author")
     */
    private $product_comments;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="user")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="currentbuyer")
     */
    private $buying;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="autobidder")
     */
    private $autobidding;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;



    /*************
     *
     * Constructor
     *
     ************/
    public function __construct()
    {
        Parent::__construct();
        $this->blocked = [];
        $this->visitedBy = [];
        $this->offlineMod = false;
        $this->buying = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        $this->autobidding = new ArrayCollection();
        $this->friendsWithMe = new ArrayCollection();
        $this->user_comments = new ArrayCollection();
        $this->product_comments = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
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
     *
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
     * Set postalAdress
     *
     * @param string $postalAdress
     *
     * @return User
     */
    public function setPostalAdress($postalAdress)
    {
        $this->postalAdress = $postalAdress;

        return $this;
    }

    /**
     * Get postalAdress
     *
     * @return string
     */
    public function getPostalAdress()
    {
        return $this->postalAdress;
    }

    /**
     * Set visitedBy
     *
     * @param array $visitedBy
     *
     * @return User
     */
    public function setVisitedBy($visitedBy)
    {
        $this->visitedBy = $visitedBy;

        return $this;
    }

    /**
     * Get visitedBy
     *
     * @return array
     */
    public function getVisitedBy()
    {
        return $this->visitedBy;
    }

    /**
     * Set blocked
     *
     * @param array $blocked
     *
     * @return User
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return array
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * Set offlineMod
     *
     * @param boolean $offlineMod
     *
     * @return User
     */
    public function setOfflineMod($offlineMod)
    {
        $this->offlineMod = $offlineMod;

        return $this;
    }

    /**
     * Get offlineMod
     *
     * @return bool
     */
    public function getOfflineMod()
    {
        return $this->offlineMod;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\User_Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\User_Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\User_Comment $comment
     */
    public function removeComment(\AppBundle\Entity\User_Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return User
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     *
     * @return User
     */
    public function addFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     *
     * @return User
     */
    public function addMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends[] = $myFriend;

        return $this;
    }

    /**
     * Remove myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     */
    public function removeMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends->removeElement($myFriend);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add userComment
     *
     * @param \AppBundle\Entity\User_Comment $userComment
     *
     * @return User
     */
    public function addUserComment(\AppBundle\Entity\User_Comment $userComment)
    {
        $this->user_comments[] = $userComment;

        return $this;
    }

    /**
     * Remove userComment
     *
     * @param \AppBundle\Entity\User_Comment $userComment
     */
    public function removeUserComment(\AppBundle\Entity\User_Comment $userComment)
    {
        $this->user_comments->removeElement($userComment);
    }

    /**
     * Get userComments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserComments()
    {
        return $this->user_comments;
    }

    /**
     * Add productComment
     *
     * @param \AppBundle\Entity\Product_Comment $productComment
     *
     * @return User
     */
    public function addProductComment(\AppBundle\Entity\Product_Comment $productComment)
    {
        $this->product_comments[] = $productComment;

        return $this;
    }

    /**
     * Remove productComment
     *
     * @param \AppBundle\Entity\Product_Comment $productComment
     */
    public function removeProductComment(\AppBundle\Entity\Product_Comment $productComment)
    {
        $this->product_comments->removeElement($productComment);
    }

    /**
     * Get productComments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductComments()
    {
        return $this->product_comments;
    }

    /**
     * Add buying
     *
     * @param \AppBundle\Entity\Product $buying
     *
     * @return User
     */
    public function addBuying(\AppBundle\Entity\Product $buying)
    {
        $this->buying[] = $buying;

        return $this;
    }

    /**
     * Remove buying
     *
     * @param \AppBundle\Entity\Product $buying
     */
    public function removeBuying(\AppBundle\Entity\Product $buying)
    {
        $this->buying->removeElement($buying);
    }

    /**
     * Get buying
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBuying()
    {
        return $this->buying;
    }

    /**
     * Add autobidding
     *
     * @param \AppBundle\Entity\Product $autobidding
     *
     * @return User
     */
    public function addAutobidding(\AppBundle\Entity\Product $autobidding)
    {
        $this->autobidding[] = $autobidding;

        return $this;
    }

    /**
     * Remove autobidding
     *
     * @param \AppBundle\Entity\Product $autobidding
     */
    public function removeAutobidding(\AppBundle\Entity\Product $autobidding)
    {
        $this->autobidding->removeElement($autobidding);
    }

    /**
     * Get autobidding
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAutobidding()
    {
        return $this->autobidding;
    }
}
