<?php

namespace AppBundle;

use FOS\UserBundle\FOSUserBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
