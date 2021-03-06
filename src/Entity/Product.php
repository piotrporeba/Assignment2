<?php
/**
 * Product class
 * @author Piotr Poreba
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * class product
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{

    /**
     * param review
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="products")
     */
    private $review;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->review = new ArrayCollection();
    }


    /**
     * param id
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * param title
     * @ORM\Column(type="string", length=100)
     *
     */
    private $title;

    /**
     * param description
     * @ORM\Column(type="string", length=100)
     *
     */
    private $description;

    /**
     * param price
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $price;

    /**
     * param summary
     * @ORM\Column(type="string", length=100)
     *
     */
    private $summary;

    /**
     * param photo
     * @ORM\Column(type="string", length=100)
     *
     */
    private $photo;

    /**
     * param ingreedients
     * @ORM\Column(type="string", length=100)
     *
     */
    private $ingredients;

    /**
     * param ispublic
     * @ORM\Column(type="boolean")
     *
     */
    private $isPublic;

    /**
     * function getreview()
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * function setreview()
     * @param mixed $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

    /**
     * function getid
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * function setId
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * function get title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * function set title
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * function getDescription
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * function setDescription
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * function getprice
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * function setprice
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * function getSummary
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * function setsummary
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * function getphoto
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * function setphoto
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * function getIngredients
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * function setIngredientds
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * function getIsPublic
     * @return mixed
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * function setIsublic
     * @param mixed $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }

    /**
     * function tostring
     * @return string
     */
    public function __toString()
    {
        return "{$this->title}";

    }

}
