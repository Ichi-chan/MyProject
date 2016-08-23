<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $filmName = $options['filmName'];
        $filmName = substr($filmName, 1);
        $filmName = trim($filmName);
        $film_mas = explode(',', $filmName);

        foreach ($film_mas as $film) {
            $builder->add(
                $film,
                TextType::class,
                array(
                    "attr" => array(
                        'name' => "filmName",
                        'maxlength' => 25,
                        'size' => 40,
                        'class' => 'form-control',
                        'style' => 'margin-bottom 15px',
                    )
                )
            );
        }

           $builder ->add(
                'return',
                ButtonType::class,
                array(
                    'label' => "return",
                    "attr" => array(
                        'name' => "return",
                        'class' => "btn btn-primary btn-lg btn-reserved",
                        'style' => 'margin-left:75%',
                    )
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'filmName' => '',
        ));
    }
}