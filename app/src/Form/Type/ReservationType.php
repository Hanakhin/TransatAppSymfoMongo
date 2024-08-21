<?php

namespace App\Form\Type;

use App\Document\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de réservation',
                'attr' =>[
                    'class' => 'datepicker',
                ]
            ])
            ->add('emplacement', ChoiceType::class, [
                'choices' => [
                    'Plage Nord' => 'Plage Nord',
                    'Plage Sud' => 'Plage Sud',
                    'Plage Est' => 'Plage Est',
                    'Plage Ouest' => 'Plage Ouest',
                ],
                'label' => 'Emplacement',
            ])
            ->add('heureDebut', ChoiceType::class, [
                'choices' => [
                    '8h' => '08:00',
                    '9h' => '09:00',
                    '10h' => '10:00',
                    '11h' => '11:00',
                    '12h' => '12:00',
                    '13h' => '13:00',
                    '14h' => '14:00',
                    '15h' => '15:00',
                    '16h' => '16:00',
                    '17h' => '17:00',
                ],
                'label' => 'Heure de début',
            ])
            ->add('horaires', ChoiceType::class, [
                'choices' => [
                    '1 heure' => 1,
                    '2 heures' => 2,
                    '3 heures' => 3,
                ],
                'label' => 'Durée de réservation',
            ])
            ->add('prix', NumberType::class, [
                'label' => 'Prix',
                'scale' => 2,
                'attr' => [
                    'readonly' => true,
                ],
            ])
            ->add('nbTransat',ChoiceType::class, [
                'choices' => [
                    '1'=>1,
                    '2'=>2
                ],
                'label' => 'Nombre de transats'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}