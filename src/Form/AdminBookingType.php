<?php

namespace App\Form;

use App\Entity\Ad;
use App\Entity\User;
use App\Entity\Booking;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdminBookingType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, $this->getFormConfiguration("Date d'arrivée", "La date de votre arrivée", [
                'widget' => 'single_text'
            ]))
            ->add('endDate', DateType::class, $this->getFormConfiguration("Date de départ", "La date de votre départ", [
                'widget' => 'single_text'
            ]))
            ->add('comment', TextareaType::class, $this->getFormConfiguration("Commentaire", "Vous pouvez laisser un commentaire ici si besoin", [
                "required" => false
            ]))
            ->add('booker', EntityType::class, [
                'class' => User::Class,
                'label' => 'Nom',
                'choice_label' => function($user) {
                    return $user->getFirstName() . " " . strtoupper($user->getLastName());
                }
            ])
            ->add('ad', EntityType::class, [
                'class' => Ad::class,
                'label' => 'Annonce',
                'choice_label' => 'title'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
