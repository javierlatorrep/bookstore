<?php

namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Repository\BookRepository;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $writer;

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

    public function getWriter() {
        return $this->$writer;
    }

    public function setWriter($writer) {
        $this->writer = $writer;
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
