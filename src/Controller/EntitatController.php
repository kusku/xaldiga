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

    public function newsAction()
    {
        $news1 = array(
            "id" => "1",
            "title" => "Els Diables participen al Correfoc de Sant Boi de Llobregat juntament amb dues colles més convidades per a la ocasió",
            "description" => "Aquesta és la descripció més cutre i mal feta que s'ha vist mai com a notícia, però em serveix com a exemple enlloc d'anar repetint x vegades el típic Hello World!",
            "date" => "15 Juny 2019"
        );

        $news2 = array(
            "id" => "2",
            "title" => "Els Tabalers posen ritme al Carnestoltes Infantil del 2019",
            "description" => "Descripció notícia 2",
            "date" => "27 Febrer 2019"
        );

        $news3 = array(
            "id" => "3",
            "title" => "Diablons i Tabalons fan un Correfoc a les festes de l'Oms i de Prat",
            "description" => "Descripció notícia 3",
            "date" => "12 Juny 2019"
        );

        $news4 = array(
            "id" => "4",
            "title" => "La Tremenda surt a la Cavalcada de Ses Majestats els Reis d'Orient",
            "description" => "Descripció notícia 4",
            "date" => "05 Gener 2019"
        );

        $newsInfo = array([$news1, $news2, $news3], [$news4]);

        return $this->render('web/news.html.twig', ['newsInfo' => $newsInfo]);
    }
}