<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RemoveController extends AbstractController
{
    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function index(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(TournamentEntry1::class);
        $entry = $products = $repository->findBy(
            array('id' => $id)
        );

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($entry[0]);
        $entityManager->flush();


        return $this->redirectToRoute('tournament', ['pw' => 'haha']);
    }
}
