<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'email',
                LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'),
                array(
                    "attr" => array(
                        'translation_domain' => 'FOSUserBundle',
                        'class' => "form-control",
                        "id" => "email",
                        "placeholder" => "Email",
                    ))
            )
            ->add('username'
                , null,
                array(
                    "attr" => array(
                        'translation_domain' => 'FOSUserBundle',
                        "class" => "form-control",
                        "id" => "username",
                        "placeholder" => "Username")
                )
            )
            ->add('plainPassword',
                LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'),
                array(
                    'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array(
                        "attr" => array(
                            'label' => 'password',
                            "type" => "password",
                            "class" => "form-control",
                            "id" => "inputPassword3",
                            "placeholder" => "Password",

                        )),
                    'second_options' =>array(
                        "attr" => array(
                            'label' => 'Repeat pasword',
                            "type" => "password",
                            "class" => "form-control",
                            "id" => "repeat_pasword",
                            "placeholder" => "Repeat Password",)),
                    'invalid_message' => 'fos_user.password.mismatch',
                ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'registration',
            // BC for SF < 2.8
            'intention' => 'registration',
        ));
    }

    // BC for SF < 2.7
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    // BC for SF < 3.0
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    public function getBlockPrefix()
    {
        return 'fos_user_registration';
    }
}