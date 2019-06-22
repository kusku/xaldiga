<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WebController extends AbstractController
{
    public function homepageAction()
    {
        $calendar1 = array(
            "day" => "25",
            "month" => "tid_august",
            "year" => "2019",
            "title" => "Moscada Infantil",
            "hour" => "20:00h",
            "dir" => "Plaça Major",
            "city" => "Manresa"
        );

        $calendar2 = array(
            "day" => "31",
            "month" => "tid_august",
            "year" => "2019",
            "title" => "La Mostra",
            "hour" => "21:30h",
            "dir" => "Plaça Major",
            "city" => "Manresa"
        );

        $calendar3 = array(
            "day" => "2",
            "month" => "tid_september",
            "year" => "2019",
            "title" => "El Correfoc de Manresa",
            "hour" => "21:30h",
            "dir" => "Plaça Major",
            "city" => "Manresa"
        );

        $calendarElements = array($calendar1, $calendar2, $calendar3);

        return $this->render('web/homepage.html.twig', ['calendarElements' => $calendarElements]);
    }
}