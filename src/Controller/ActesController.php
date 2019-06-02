<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActesController extends AbstractController
{
    public function correaiguaAction()
    {
        $genericInfo = array(
            "sectionFolder" => "correaigua",
            "title" => "tid_correaigua_title",
            "description" => "tid_correaigua_desc",
            "mainImageDescription" => "tid_correaigua_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function moscadaInfantilAction()
    {
        return $this->render('web/moscada-infantil.html.twig');
    }

    public function bategadaAction()
    {
        return $this->render('web/bategada.html.twig');
    }

    public function carnavaladaAction()
    {
        return $this->render('web/carnavalada.html.twig');
    }

    public function trobadaDiablesAction()
    {
        return $this->render('web/trobada-diables.html.twig');
    }

    public function aixadaAction()
    {
        return $this->render('web/aixada.html.twig');
    }

    public function passatgeTerrorAction()
    {
        $genericInfo = array(
            "sectionFolder" => "passatge-terror",
            "title" => "tid_passatge_terror_title",
            "description" => "tid_passatge_terror_desc",
            "mainImageDescription" => "tid_passatge_terror_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
    }
}