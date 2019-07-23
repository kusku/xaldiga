<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntitatController extends AbstractController
{
    public function equipPermanentAction()
    {
        return $this->render('web/equip-permanent.html.twig');
    }

    public function entitatAction()
    {
        return $this->render('web/entitat.html.twig');
    }

    public function agendaAction()
    {
        $acte1 = array(
            "day" => "25",
            "month" => "tid_august",
            "year" => "2019",
            "title" => "Moscada Infantil",
            "hour" => "20:00h",
            "dir" => "Plaça Major",
            "city" => "Manresa",
            "description" => "Recorregut: Plaça Major, Carrer Sant Miquel, Carrer Sabateria, Carrer Pedregar, Plaça del Carme, Carrer Cap del Rec, Plaça Major."
        );
        
        $acte2 = array(
            "day" => "31",
            "month" => "tid_august",
            "year" => "2019",
            "title" => "La Mostra",
            "hour" => "21:30h",
            "dir" => "Plaça Major",
            "city" => "Manresa",
            "description" => "Description"
        );

        $acte3 = array(
            "day" => "02",
            "month" => "tid_september",
            "year" => "2019",
            "title" => "El Correfoc",
            "hour" => "21:30h",
            "dir" => "Plaça Major",
            "city" => "Manresa",
            "description" => "Description"
        );

        $actes2019 = array($acte1, $acte2, $acte3);
        $actes2020 = array($acte1, $acte2, $acte3);

        $agendaInfo = [2019 => $actes2019, 2020 => $actes2020];

        return $this->render('web/agenda.html.twig', ['agendaInfo' => $agendaInfo]);
    }
}