<?php 

namespace App\GraphQL\Resolver;

use Overblog\GraphQLBundle\Annotation as GQL;
use App\Entity\Product; // Assurez-vous d'importer la classe Product
use App\Repository\ProduitRepository;

class ProductsResolver
{
    /**
     * @GQL\Query
     */
    public function getProducts(ProduitRepository $produitRepository)
    {
        
        $products = $produitRepository->findAll();

        return $products;
    }
}
