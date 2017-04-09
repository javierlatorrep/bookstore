<?php

namespace UserBundle;

use UserBundle\DependencyInjection\UserExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new UserExtension();
    }
}
