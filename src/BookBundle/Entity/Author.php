<?php

namespace BookBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */
class Author
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
    private $name;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $surnames;
    
    /**
     * @ORM\ManyToMany(
     *     targetEntity="Book",
     *     inversedBy="authors"
     * )
     * @ORM\OrderBy({"title" = "ASC"})
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getSurnames()
    {
        return $this->surnames;
    }

    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }
    
    public function getFullName()
    {
        return trim(trim($this->getName()) . ' ' . trim($this->getSurnames()));
    }
    
    /**
     * @return ArrayCollection|Book[]
     */
    public function getBooks()
    {
        return $this->books;
    }
}
