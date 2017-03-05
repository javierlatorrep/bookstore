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

    // Crec que el nom hauria de ser => addBookAuthor pero sino no carrega
    // els fixtures (Alice).
    // Si intentes inserta dona un error:
    //      Could not determine access type for property "authors".
    // Quan modifiquem el nom del metode per setAuthors em dona
    //      Expected argument of type "BookBundle\Entity\Author", "Doctrine\Common\Collections\ArrayCollection" given
    public function setAuthor(Author $author) {
        if ($this->authors->contains($author)) {
            return;
        }
        
        $this->authors[] = $author;
        $author->addAuthorBook($this);
    }
    
    public function removeBookAuthor(Author $author) {
        if ($this->authors->contains($author)) {
            return;
        }
        
        $this->authors->removeElement($author);
        $author->removeAuthorBook($this);
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
