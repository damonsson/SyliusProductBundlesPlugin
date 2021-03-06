<?php

declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright 2018 solutionDrive GmbH
 */

namespace solutionDrive\SyliusProductBundlesPlugin\Form\Type;

use Sylius\Bundle\ProductBundle\Form\Type\ProductAutocompleteChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductBundleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ProductAutocompleteChoiceType::class, [
                'label' => 'sylius.ui.product',
                'required' => true,
                'constraints' => [new NotBlank()],
            ])
            ->add('slots', CollectionType::class, [
                'entry_type' => ProductBundleSlotType::class,
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'prototype' => true,
                'label' => false,
                'button_add_label' => 'solutiondrive.ui.add_slot',
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'product_bundle';
    }
}
