<?php

namespace App\Controller;

use App\Entity\TournamentEntry1;
use App\form\Type\TournamentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request)
    {
        $pw = false;
        if(isset($_GET['pw']) && $_GET['pw'] === 'haha') {
            $pw=true;
        }
        // creates a task object and initializes some data for this example
        $entry = new TournamentEntry1();
        $entry->setDate(new \DateTime());

        $form = $this->createForm(TournamentType::class, $entry);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entry = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entry);
            $entityManager->flush();

            return $this->redirectToRoute('tournament');
        }


        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),
            'pw' => $pw
        ]);

        // ...

    }
}
