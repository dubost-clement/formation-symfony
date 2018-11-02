<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AnnonceType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getFormConfiguration("Titre", "Titre de votre annonce"))
            ->add('imageFile', FileType::class, $this->getFormConfiguration("Image principale", "Choisissez une image"))
            ->add('introduction', TextType::class, $this->getFormConfiguration("Introduction", "Donnez une description globale de l'annonce"))
            ->add('content', CKEditorType::class, $this->getFormConfiguration("Description", "Tapez une description qui donne  envie de venir chez vous", [
                'config_name' => 'my_config'
            ]))
            ->add('rooms', IntegerType::class, $this->getFormConfiguration("Nombre de chambres", "Donnez le nombre de chambres disponibles"))
            ->add('price', MoneyType::class, $this->getFormConfiguration("Prix par nuit", "Indiquez le prix par nuit"))
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ])
            ->add('address', TextType::class, $this->getFormConfiguration("Adresse", "L'adresse de votre bien"))
            ->add('lat', HiddenType::class, $this->getFormConfiguration("lat", "La lattitude"))
            ->add('lng', HiddenType::class, $this->getFormConfiguration("lng", "la longitude"))   
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
