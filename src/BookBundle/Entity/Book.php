<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use BookBundle\Repository\BookRepository;
use BookBundle\Entity\Author;

/**
 * @ORM\Entity(repositoryClass="BookBundle\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\ManyToMany(
     *     targetEntity="Author",
     *     inversedBy="books"
     * )
     * @Assert\NotBlank()
     */
    private $authors;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $publicationDate;

    /**
     * @ORM\Column(
     *     type="string",
     *     nullable=true
     * )
     * 
     */
    private $edition;
    
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $price;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return ArrayCollection|Author[]
     */
    public function getAuthors() {
        return $this->authors;
    }
    
    /**
     * Need this method because of fixtures load
     */
    public function setAuthor(Author $author) {
        $this->addAuthor($author);
    }

    public function addAuthor(Author $author) {
        if ($this->authors->contains($author)) {
            return;
        }
        
        $this->authors[] = $author;
        $author->addBook($this);
    }
    
    public function removeAuthor(Author $author) {
        if ($this->authors->contains($author)) {
            return;
        }
        
        $this->authors->removeElement($author);
        $author->removeBook($this);
    }

    public function getPublicationDate() {
        return $this->publicationDate;
    }

    public function setPublicationDate($publicationDate) {
        $this->publicationDate = $publicationDate;
    }

    public function getEdition() {
        return $this->edition;
    }

    public function setEdition($edition) {
        $this->edition = $edition;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}
