<?php

namespace BookBundle\Event;

use BookBundle\Entity\Book;
use Symfony\Component\EventDispatcher\Event;

class BookCreatedEvent extends Event 
{
    const NAME = 'book.created';

    private $book;
    
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    
    public function getBook() 
    {
        return $this->book;
    }
}
