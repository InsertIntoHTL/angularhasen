<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use App\form\Type\TournamentType;
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
        $pw = false;
        if(isset($_GET['pw']) && $_GET['pw'] === 'haha') {
            $pw=true;
        }
        $repository = $this->getDoctrine()->getRepository(TournamentEntry1::class);
        $tournamentEntries = $products = $repository->findBy(
            array(),
            array('traveldistance' => 'DESC')
        );

        return $this->render('tournament/tournament.html.twig', [
            'tournamententries' => $tournamentEntries,
            'pw' => $pw
        ]);
    }





    /**
     * @Route("/tournament/create/{traveldistance}/{participantname}/{flightduration}/{paperplanemodel}", name="create_tournamentEntry")
     */
    public function createTournamentEntry(float $traveldistance, string $participantname, float $flightduration, string $paperplanemodel): Response
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


        return new Response('Saved new product with id ' . $tournamentEntry->getId());
    }
}
