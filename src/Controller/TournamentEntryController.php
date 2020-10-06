<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TournamentEntryController extends AbstractController
{
    /**
     * @Route("/results/{id}", name="tournament_entry")
     */
    public function index(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(TournamentEntry1::class);
        $tournamentEntry = $products = $repository->findBy(
            array('id' => $id)
        );

        return $this->render('tournament_entry/index.html.twig', [
            'tournamentEntry' => $tournamentEntry,
        ]);
    }

}
