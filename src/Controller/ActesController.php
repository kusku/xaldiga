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
        $genericInfo = array(
            "sectionFolder" => "moscada-infantil",
            "title" => "tid_moscada_infantil_title",
            "description" => "tid_moscada_infantil_desc",
            "mainImageDescription" => "tid_moscada_infantil_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function bategadaAction()
    {
        $genericInfo = array(
            "sectionFolder" => "bategada",
            "title" => "tid_bategada_title",
            "description" => "tid_bategada_desc",
            "mainImageDescription" => "tid_bategada_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function carnavaladaAction()
    {
        return $this->render('web/carnavalada.html.twig');
    }

    public function trobadaDiablesAction()
    {
        $genericInfo = array(
            "sectionFolder" => "trobada-diables",
            "title" => "tid_trobada_diables_title",
            "description" => "tid_trobada_diables_desc",
            "mainImageDescription" => "tid_trobada_diables_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function aixadaAction()
    {
        $genericInfo = array(
            "sectionFolder" => "aixada",
            "title" => "tid_aixada_title",
            "description" => "tid_aixada_desc",
            "mainImageDescription" => "tid_aixada_main_image_desc"
        );

        return $this->render('web/actes.html.twig', ['genericInfo' => $genericInfo]);
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