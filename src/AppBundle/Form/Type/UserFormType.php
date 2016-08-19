<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;

class UserFormType extends AbstractType
{
    public function  buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'Reserved',
            ButtonType::class,
            array(
                'label' => "Reserved",
                "attr" => array(
                    'data-toggle' => "modal",
                    'data-target' => "#myModal",
                    'name' => "Reserved",
                    'class' => "btn btn-primary btn-lg btn-reserved",
                    'style' => 'margin-left:75%',
                )
            )
        );
    }
}