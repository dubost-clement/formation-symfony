<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType
{
    /**
     * Configuration de base d'un champ de formulaire
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    protected function getFormConfiguration($label, $placeholder, $options = [])
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }

    /**
     * Configuration champ de formulaire des images
     *
     * @param string $placeholder
     * @return array
     */
    protected function getPlaceholderForm($placeholder)
    {
        return [
            'attr' => [
                'placeholder' => $placeholder
            ]
        ];
    }
}