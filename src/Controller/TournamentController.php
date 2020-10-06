<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TournamentController extends AbstractController
{
    /**
     * @Route("/results", name="tournament")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(TournamentEntry1::class);
        $tournamentEntries = $products = $repository->findBy(
            array(),
            array('traveldistance' => 'DESC')
        );

        return $this->render('tournament/tournament.html.twig', [
            'tournamententries' => $tournamentEntries,
        ]);
    }

    /**
     * @Route("/tournament/create/{traveldistance}/{participantname}/{flightduration}/{paperplanemodel}", name="create_tournamentEntry")
     */
    public function createTournamentEntry(float $traveldistance, string $participantname,float $flightduration,string $paperplanemodel): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $tournamentEntry = new TournamentEntry1();
        $tournamentEntry->setTraveldistance($traveldistance);
        $tournamentEntry->setParticipantName($participantname);
        $tournamentEntry->setFlightduration($flightduration);
        $tournamentEntry->setDate(new \DateTime());
        $tournamentEntry->setPaperplaneModel($paperplanemodel);


        $entityManager->persist($tournamentEntry);

        $entityManager->flush();


        return new Response('Saved new product with id '.$tournamentEntry->getId());
    }

    /**
     * @Route("/tournament/show/{id}", name="product_show")
     */
    public function show(TournamentEntry1 $tournamentEntry1)
    {

        return new Response('Check out this great product: '.$tournamentEntry1->getTraveldistance());

    }
}
