<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SayHelloController extends AbstractController
{
    /**
     * @Route("/sayhello")
     */
    public function number()
    {
        $tournamentEntries = [
            [40.23, 15.53, 'Hirsies Flitzer', 'Hirsie', "12.02.2020"],
            [40.23, 15.53, 'Hirsies Flitzer', 'Hirsie', "12.02.2020"],
            [40.23, 15.53, 'Hirsies Flitzer', 'Hirsie', "12.02.2020"]
            ];


        return $this->render('sayhello/greeting.html.twig.html', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'tournamententries' => $tournamentEntries
        ]);
    }
}