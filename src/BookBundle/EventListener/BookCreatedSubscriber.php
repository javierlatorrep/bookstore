<?php

namespace BookBundle\EventListener;

use BookBundle\Event\BookCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BookCreatedSubscriber implements EventSubscriberInterface 
{
    public static function getSubscribedEvents()
    {
        return array(
            BookCreatedEvent::NAME => 'onBookCreated'
        );
    }
    
    public function onBookCreated(BookCreatedEvent $bookCreatedEvent) {
        // Test event to know how it works. 
        //echo($bookCreatedEvent->getBook()->getTitle());die;
    }
}
