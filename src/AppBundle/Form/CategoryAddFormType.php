<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class CategoryAddForm
 * @package AppBundle\Form
 */
class CategoryAddFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                array(
                    'attr'=>
                    array(
                        'class'=>'form-control',
                        'style'=>'margin-bottom 15px'
                    )
                )
            )
            ->add(
                'save',
                SubmitType::class,
                array(
                    'label'=>'Edit Category',
                    'attr'=>array(
                        'class'=>'btn btn-succsess',
                        'style'=>'margin-bottom 15px'
                    )
                )
            );
    }
}