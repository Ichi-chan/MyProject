<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
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
        $builder;
        $label = "";
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                $label = ($i + 1) . "-" . ($j + 1);
                $builder->add(
                    '[' . $i . ']-[' . $j . ']',
                    SubmitType::class,
                    array(
                        'label' => $label,
                        "attr" => array(
                            'class' => 'btn btn-primary',
                            'background' => ' #2aabd2',
                            'width' => '800px',
                            'height' => '500px',
                            'border-radius' => '5px',
                            'box-shadow' => '0px 1px 3px',
                            'font-size' => '30px',
                            'float-displace'=>':ident',
                        )
                    )
                );
            }
        }

        //<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
        // data-target="#myModal" name="Launch demo modal">
        //Launch demo modal
        //</button>
        $builder->add(
            'Reserved',
            ButtonType::class,
            array(
                'label' => "Reserved",
                "attr" => array(
                    'data-toggle' => "modal",
                    'data-target' => "#myModal",
                    'name' => "Reserved",
                    'class'=>"btn btn-primary btn-lg",
                )
            )
        );
    }
}