<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoicePlaceFormType extends AbstractType
{
    private $manager;

    public function __construct()
    {
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //for ($i=0;$i<100;$i++)

        /** @var Place $place */
       /* $availability = $builder->getData();
        if ($availability != null) {
        //    $availability->getNumPlace();
            $place = $availability;*/
        $opt=$options['places']->getData();
        $availability = $builder->getData();
        $availability=trim($availability);
        if ($availability != null) {
//$availability->getNumPlace();
            $place = $availability;

        } else {
            $place = ',';
        }

        $attr = array('class' => 'btn btn-primary place-button',
            'background' => ' #2aabd2',
            'style' => 'width: 100%; height: 100%',);
        for ($i = 1; $i < 11; $i++) {
            for ($j = 1; $j < 11; $j++) {
                $label = ($i) . "-" . ($j);
                if (strripos($place, $label) == true) {
                    $attr['disabled'] = true;
                } else {
                    $attr['disabled'] = false;
                }
                $builder->add(
                    '[' . $i . ']-[' . $j . ']',
                    ButtonType::class,
                    array(
                        'label' => $label,
                        "attr" => $attr
                    )
                );

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
                    'class' => "btn btn-primary btn-lg btn-reserved",
                    'style' => 'margin-left:75%',
                )
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'places' => '',
        ));
    }
}