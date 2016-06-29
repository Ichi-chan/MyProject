<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 05.05.16
 * Time: 14:34
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CategoryAddFormType
 * @package AppBundle\Form
 */
class ControlFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function  buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'cancel',
                SubmitType::class,
                array(
                    'label' => 'Cancel',
                    'attr' => array(
                        'class' => 'btn btn-default',
                        'style' => 'margin-botom 15px'
                    )
                )
            )
            ->add(
                'remove',
                SubmitType::class,
                array(
                    'label'=>'remove',
                    'attr'=>array(
                            'class'=>'btn btn-danger',
                            'style'=>'margin-botom 15x'
                            )
                )
            )
            ->add(
                'edit',
                SubmitType::class,
                array(
                    'label'=>'Edit',
                    'attr'=> array(
                            'class'=>'btn btn-success',
                            'style'=>'margin-botom 15x'
                    )
                )
            );
    }

//    /**
//     * @return mixed
//     */
//    public function getParent()
//    {
//        return '';
//    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('compound', true);
    }
}