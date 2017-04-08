<?php

namespace BookBundle\Services\Model;

use BookBundle\Entity\Book;
use Doctrine\Common\Persistence\ObjectManager;

class BookManager
{
    private $objectManager;
    
    public function __construct(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }
    
    public function createBook(Book $book) {
        $this->objectManager->persist($book);
        $this->objectManager->flush();
    }
}
