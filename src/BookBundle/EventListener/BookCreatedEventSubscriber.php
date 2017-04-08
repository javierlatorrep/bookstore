<?php

namespace BookBundle\EventListener;

use BookBundle\Entity\Book;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BookCreatedSubscriber extends EventSubscriberInterface 
{
    public static function getSubscribedEvents()
    {
        return array(
            'book.created' => array(
                array('processException', 10),
                array('logException', 0),
                array('notifyException', -10),
            )
        );
    }
    
    public function getBook() 
    {
        return $this->book;
    }
}
