<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;


/**
 * Class FilmAddFormType
 * @package AppBundle\Form
 */
class  FilmAddFormType extends AbstractType
{
    private $manager;

    /**
     * FilmAddFormType constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager=$manager;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                array(
                    'attr' =>
                        array(
                            'class' => 'form-control',
                            'style' => 'margin-bottom 15px',
                        )
                )
            )
            ->add(
                'category',
                EntityType::class,
                array(
                    'class'=> 'AppBundle\Entity\Category',
                    'choice_label'=>'name',
                    'label' => 'Category',
                    'multiple' => true,
                    'expanded' => true,
                    //'expanded'=>'true',
                    'attr' =>
                        array(
                       //     'class' => 'form-control',
                          //  'style' => 'margin-bottom 15px',
                        )
                )
            )
            ->add(
                'released',
                DateTimeType::class,
                array(
                    'attr' => array(
                        'format'=>'dd,MM,yyy',
                        'style'=>'margin-bottom 15px',
                    )
                )
            )
            ->add(
                'producer',
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
                'main_role',
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
                'age_qualification',
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
                'duration',
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
                'format',
                ChoiceType::class,
                array(
                    'choices'=>array(
                        '2D'=>'2D',
                        '3D'=>'3D'
                    ),
                    'attr'=>array(
                        'class'=>'form-control',
                        'style'=>'margin-bottom 15px'
                    )
                )
            )
            ->add(
                'hole',
                ChoiceType::class,
                array(
                    'choices'=>array(
                        'Blue'=>'Blue',
                        'Red'=>'Red'
                    ),
                    'attr'=>array(
                        'class'=>'form-control',
                        'style'=>'margin-bottom 15px'
                    )
                )
            )
            ->add(
                'annotation',
                TextareaType::class,
                array(
                    'attr'=>
                    array(
                        'class'=>'form-control',
                        'style'=>'height: 150px',
                    )
                )
            )
            ->add(
                'releasInWord',
                DateType::class,
                array(
                    'attr'=>
                    array(
                        'format'=>'dd,MM,yyy',
                        'style'=>'margin-bottom 15px',
                    )
                )
            )
            ->add(
                'imageFile',
                VichImageType::class,
                array(
                    'label'=>'browse',
                    'attr'=>array(
                        'require' => false,
                        'allow_delete' => true, // not mandatory, default is true
                        'download_link' => true, // not mandatory, default is true
                        'class'=>'btn btn-primary',
                        'style'=>'margin-bottom 15px',
                    )
                )
            )
            ->add(
                'save',
                SubmitType::class,
                array(
                    'label' => 'Edit Film',
                    'attr' => array(
                        'class' => 'btn btn-primary',
                        'style' => 'margin-bottom 15px',
                    )
                )
            );
    }
}