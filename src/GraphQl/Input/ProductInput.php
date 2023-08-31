<?php 

namespace App\GraphQL\Input;

use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Input
 */
class ProductInput
{
    /**
     * @GQL\Field(type="String!")
     */
    private $Nom;

    /**
     * @GQL\Field(type="Int!")
     */
    private $Quantite;

    /**
     * @GQL\Field(type="Float!")
     */
    private $Prix;

    public function getNom(): string
    {
        return $this->Nom;
    }

    public function getQuantity(): int
    {
        return $this->Quantite;
    }

    public function getPrice(): float
    {
        return $this->Prix;
    }
}
