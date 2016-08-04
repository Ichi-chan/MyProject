<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


class ModalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
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
                EmailType::class,
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
                    )
                )
            )
            ->add(
                'close',
                SubmitType::class,
                array(
                    'label' => "close",
                    "attr" => array(
                        'class' => 'btn btn-default btn-reserved',
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
                        'class' => 'btn btn-primary btn-lg btn-reserved',
                        'name' => "send message",
                        'id' => "send message",
                    )
                )
            );
    }
}

