<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ChoicePlaceFormType extends AbstractType
{
    private $manager;

    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //for ($i=0;$i<100;$i++)
        $builder
            ->add(
                'hh',
                SubmitType::class,
                array(
                    'label'=>'lklkl',
                    "attr"=>array(
                        'class'=>'btn btn-primary',
                        'background'=> ' #2aabd2',
                        'width'=> '80px',
                        'height'=>'40px',
                        'border-radius'=> '5px',
                        'box-shadow'=>'0px 1px 3px',
                        'font-size'=> '20px',
                    )
                    )
                );
    }
}