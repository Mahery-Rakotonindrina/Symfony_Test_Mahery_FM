<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Commande;
use App\Entity\Produit;
use App\Form\CommandeType;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande_index')]
    public function index(CommandeRepository $commandeRepository): Response
    {
        $commandes = $commandeRepository->findAll();
// dd($commandes);
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes,
        ]);
    }

    #[Route('/commande/new', name: 'app_commande_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez l'ID du client et associez-le à la commande
            $clientId = $form->get('client')->getData();
            $client = $em->getRepository(Client::class)->find($clientId);
            $commande->setClient($client);

            // Récupérez les IDs des produits sélectionnés
            $produitIds = $form->get('produits')->getData();
            // Obtenez les objets Produit correspondants à partir de leurs IDs
            $produits = [];
            foreach ($produitIds as $produitId) {
                $produit = $em->getRepository(Produit::class)->find($produitId);
                if ($produit) {
                    $commande->addProduit($produit);
                }
            }
            // Persistez la commande avec les produits associés
            $em->persist($commande);
            
            $em->flush();
            return $this->redirectToRoute('app_commande_index');
        }

        return $this->render('commande/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
