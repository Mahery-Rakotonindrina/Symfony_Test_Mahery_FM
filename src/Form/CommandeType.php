<?php
namespace App\Form;

use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numClient', EntityType::class, [
                'class' => Client::class,
                'multiple' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('createdAt', DateType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(), // default value
                'attr' => ['class' => 'form-control']
            ])
            ->add('produits', EntityType::class, [
                'class' => Produit::class,
                'multiple' => true,
                'expanded' => false,
                'attr' => ['class' => 'form-control select2']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
