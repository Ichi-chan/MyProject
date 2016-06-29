<?php
namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;

class MyBundleType extends AbstractType
{
    public function getParent()
    {
        return 'file';
    }
}