<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getFormConfiguration("Prénom", "Votre prénom ..."))
            ->add('lastName', TextType::class, $this->getFormConfiguration("Nom", "Votre nom ..."))
            ->add('email', EmailType::class, $this->getFormConfiguration("Email", "Votre adresse email ..."))
            ->add('picture', UrlType::class, $this->getFormConfiguration("Photo de profil", "Url de votre photo de profil ..."))
            ->add('hash', PasswordType::class, $this->getFormConfiguration("Mot de passe", "Votre mot de passe ..."))
            ->add('passwordConfirm', PasswordType::class, $this->getFormconfiguration("Confirmation du mot de passe", "Confirmez votre mot de passe"))
            ->add('introduction', TextType::class, $this->getFormConfiguration("Introduction", "Présentez vous en quelques mots ..."))
            ->add('description', TextareaType::class, $this->getFormConfiguration("Description détaillée", "C'est le moment de vous présenter en détails ..."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
