<?php
/**
 * review
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * class review
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
{
    /**
     * products
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="review")
     * @ORM\JoinColumn(nullable=true)
     */
    private $products;

    /**
     * id
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * author
     * @ORM\Column(type="string")
     */
    private $author;

    /**
     * date
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * summary
     * @ORM\Column(type="string")
     */
    private $summary;

    /**
     * retailers
     * @ORM\Column(type="string")
     */
    private $retailers;

    /**
     * price
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * score
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * ispubic
     * @ORM\Column(type="boolean")
     */
    private $isPublic;

    /**
     * getproducts
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * setProducts
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * getId
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * getauthor
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * setAuthor
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * getDate
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * setDate
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * getSummary
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * setSummary
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * getRetailers
     * @return mixed
     */
    public function getRetailers()
    {
        return $this->retailers;
    }

    /**
     * setRetailers
     * @param mixed $retailers
     */
    public function setRetailers($retailers)
    {
        $this->retailers = $retailers;
    }

    /**
     * getPrice
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * setPrice
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * getScore
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * setScore
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * getIsPublic
     * @return mixed
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * setIsPublic
     * @param mixed $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }



    // add your own fields
}
