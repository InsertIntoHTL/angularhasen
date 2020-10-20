<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TournamentEntryController extends AbstractController
{

    /**
     * @Route(
     *     "/results/{id}.{_format}",
     *     format="html",
     *     name="show_tournamententry_json",
     *     requirements={
     *         "_format": "html|json|xml",
     *     }
     * )
     */
    public function index(int $id, string $_format, SerializerInterface $serializer)
    {
        $repository = $this->getDoctrine()->getRepository(TournamentEntry1::class);
        $tournamentEntry = $products = $repository->findBy(
            array('id' => $id)
        );

        if($_format=='json'){
            $jsonContent = $serializer->serialize($tournamentEntry, 'json');
            return new Response($jsonContent);
        }
        if($_format=='xml'){
            $xmlContent = $serializer->serialize($tournamentEntry, 'xml');
            return new Response($xmlContent);
        }

        return $this->render('tournament_entry/index.html.twig', [
            'tournamentEntry' => $tournamentEntry,
        ]);
    }


}
