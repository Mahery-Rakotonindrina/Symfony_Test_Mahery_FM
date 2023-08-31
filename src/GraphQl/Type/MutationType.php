<?php 

namespace App\GraphQL\Type;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class MutationType implements MutationInterface, AliasedInterface
{
    public function createProduct($args, EntityManagerInterface $entityManager)
    {
        $product = new Produit();
        $product->setNom($args['name']);
        $product->setQuantite($args['quantity']);
        $product->setPrix($args['price']);

        $entityManager->persist($product);
        $entityManager->flush();

        return $product;
    }

}
