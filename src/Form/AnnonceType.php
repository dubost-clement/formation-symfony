<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AnnonceType extends AbstractType
{

    /**
     * Configuration de base d'un champ de formulaire
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getFormConfiguration($label, $placeholder)
    {
        return [
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getFormConfiguration("Titre", "Titre de votre annonce"))
            ->add('coverImage', UrlType::class, $this->getFormConfiguration("Image principale", "Donnez l'adresse d'une image"))
            ->add('introduction', TextType::class, $this->getFormConfiguration("Introduction", "Donnez une description globale de l'annonce"))
            ->add('content', TextareaType::class, $this->getFormConfiguration("Description", "Tapez une description qui donne  envie de venir chez vous"))
            ->add('rooms', IntegerType::class, $this->getFormConfiguration("Nombre de chambres", "Donnez le nombre de chambres disponibles"))
            ->add('price', MoneyType::class, $this->getFormConfiguration("Prix par nuit", "Indiquez le prix par nuit"))
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
