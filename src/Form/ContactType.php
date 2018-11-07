<?php

namespace App\Form;

use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, $this->getPlaceholderForm("Votre nom"))
            ->add('Prenom', TextType::class, $this->getFormConfiguration("Prénom", "Votre prénom"))
            ->add('Email', EmailType::class, $this->getPlaceholderForm("Votre email"))
            ->add('Objet', TextType::class, $this->getPlaceholderForm("L'objet de votre message"))
            ->add('Message', TextareaType::class, $this->getPlaceholderForm("Votre message"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
