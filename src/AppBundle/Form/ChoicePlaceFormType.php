<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;


class ChoicePlaceFormType extends AbstractType
{
   // private $manager;

    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //for ($i=0;$i<100;$i++)

        $qqq = $builder->getData();
        if ($qqq != null) {
            $qqq->getNumPlace();
            $place = $qqq->getNumPlace();

        } else {
            $place = ',';
        }

       // $builder;
        //$label = "";
        for ($i = 1; $i < 11; $i++) {
            for ($j = 1; $j < 11; $j++) {
                $label = ($i) . "-" . ($j);
                if (strripos($place, $label) == true) {
                    $builder->add(
                        '[' . $i . ']-[' . $j . ']',
                        ButtonType::class,
                        array(
                            'label' => $label,
                            "attr" => array(
                                'class' => 'btn btn-primary',
                                'background' => ' #868686',
                                'display'=>"block",
                                'border-radius' => '5px',
                                'box-shadow' => '0px 1px 3px',
                                'font-size' => '30px',
                                'float-displace' => 'ident',
                                'disabled' => 'disabled',
                                'style'=>'width: 100%; height: 100%',
                            )
                        )
                    );
                } else {
                    $builder->add(
                        '[' . $i . ']-[' . $j . ']',
                        ButtonType::class,
                        array(
                            'label' => $label,
                            "attr" => array(
                                'display'=>"block",
                                'class' => 'btn btn-primary',
                                'background' => ' #2aabd2',
                                'border-radius' => '5px',
                                'box-shadow' => '0px 1px 3px',
                                'font-size' => '30px',
                                'float-displace' => 'ident',
                                'style'=>'width: 100%; height: 100%',
                            )
                        )
                    );
                }
            }
        }
        $builder->add(
            'Reserved',
            ButtonType::class,
            array(
                'label' => "Reserved",
                "attr" => array(
                    'data-toggle' => "modal",
                    'data-target' => "#myModal",
                    'name' => "Reserved",
                    'class' => "btn btn-primary btn-lg",
                    'style'=>'margin-left:75%',
                )
            )
        );
    }
}