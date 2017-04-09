<?php

namespace BookBundle;

use BookBundle\DependencyInjection\BookExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BookBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new BookExtension();
    }
}
