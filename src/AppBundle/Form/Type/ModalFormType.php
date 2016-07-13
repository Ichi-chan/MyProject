<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ModalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
            'X',
            SubmitType::class,
            array(
                "attr" => array(
                    'lable' => "X",
                    'class' => "close",
                    'type' => "button",
                    'data-dismiss' => "modal",
                    'aria-label' => "Close",
                    'name' => "X",
                )
            )
        )
            ->add(
                'name',
                TextType::class,
                array(
                    "attr" => array(
                        'name' => "name",
                        'maxlength' => 25,
                        'size' => 40,
                        'class' => 'form-control',
                        'style' => 'margin-bottom 15px',
                    )
                )
            )
            ->add(
                'mail',
                TextType::class,
                array(
                    "attr" => array(
                        'name' => "mail",
                        'maxlength' => 25,
                        'size' => 40,
                    )
                )
            )
            ->add(
                'temp',
                TextType::class,
                array(
                    "attr" => array(
                        'id' => "temp",
                        'name' => "temp",
                        'maxlength' => 25,
                        'size' => 40,
                        'type' => "hidden",
                    )
                )
            )
            ->add(
                'close',
                SubmitType::class,
                array(
                    'label' => "close",
                    "attr" => array(
                        'class' => 'btn btn-default',
                        'name' => "close",
                        'data-dismiss' => "modal",
                        'type' => "button",
                    )
                )
            )
            ->add(
                'sendmessage',
                SubmitType::class,
                array(
                    'label' => "Send Message",
                    "attr" => array(
                        'class' => 'btn btn-primary',
                        'name' => "send message",
                        'id' => "send message",
                        'type' => "submit",
                    )
                )
            );
    }
}

