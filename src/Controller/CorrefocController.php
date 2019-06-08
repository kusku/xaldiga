<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CorrefocController extends AbstractController
{
    public function correfocAction()
    {
        $genericInfo = array(
            "sectionFolder" => "correfoc",
            "title" => "tid_correaigua_title",
            "description" => "tid_correaigua_desc",
            "mainImageDescription" => "tid_correaigua_main_image_desc"
        );
        return $this->render('web/correfoc.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function mostraAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function historiaAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function recorregutAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function dimonisAction()
    {
        $genericInfo = array(
            "sectionFolder" => "dimonis",
            "title" => "tid_correfoc_dimonis_title",
            "description" => "tid_correfoc_dimonis_desc",
            "mainImageDescription" => "tid_correfoc_dimonis_main_image_desc"
        );

        $capgirells = array(
            "title" => "tid_correfoc_dimonis_capgirells_title",
            "imageName" => "capgirells.jpg",
            "description" => "tid_correfoc_dimonis_capgirells_desc"
        );

        $fogueres = array(
            "title" => "tid_correfoc_dimonis_fogueres_title",
            "imageName" => "fogueres.jpg",
            "description" => "tid_correfoc_dimonis_fogueres_desc"
        );

        $moixogants = array(
            "title" => "tid_correfoc_dimonis_moixogants_title",
            "imageName" => "moixogants.jpg",
            "description" => "tid_correfoc_dimonis_moixogants_desc"
        );

        $sectionElements = array($capgirells, $fogueres, $moixogants);

        return $this->render('web/correfoc-page-with-sections.html.twig', ['genericInfo' => $genericInfo, 'sectionElements' => $sectionElements]);
    }

    public function bestiariAction()
    {
        $genericInfo = array(
            "sectionFolder" => "bestiari",
            "title" => "tid_correfoc_bestiari_title",
            "description" => "tid_correfoc_bestiari_desc",
            "mainImageDescription" => "tid_correfoc_bestiari_main_image_desc"
        );

        $vibria = array(
            "title" => "tid_correfoc_bestiari_vibria_title",
            "imageName" => "vibria.jpg",
            "description" => "tid_correfoc_bestiari_vibria_desc"
        );

        $drac = array(
            "title" => "tid_correfoc_bestiari_drac_title",
            "imageName" => "drac.jpg",
            "description" => "tid_correfoc_bestiari_drac_desc"
        );

        $asmodeu = array(
            "title" => "tid_correfoc_bestiari_asmodeu_title",
            "imageName" => "asmodeu.jpg",
            "description" => "tid_correfoc_bestiari_asmodeu_desc"
        );

        $gargola = array(
            "title" => "tid_correfoc_bestiari_gargola_title",
            "imageName" => "gargola.jpg",
            "description" => "tid_correfoc_bestiari_gargola_desc"
        );

        $mulassa = array(
            "title" => "tid_correfoc_bestiari_mulassa_title",
            "imageName" => "mulassa.jpg",
            "description" => "tid_correfoc_bestiari_mulassa_desc"
        );

        $nassutja = array(
            "title" => "tid_correfoc_bestiari_nassutja_title",
            "imageName" => "nassutja.jpg",
            "description" => "tid_correfoc_bestiari_nassutja_desc"
        );

        $collllarg = array(
            "title" => "tid_correfoc_bestiari_collllarg_title",
            "imageName" => "collllarg.jpg",
            "description" => "tid_correfoc_bestiari_collllarg_desc"
        );

        $bou = array(
            "title" => "tid_correfoc_bestiari_bou_title",
            "imageName" => "bou.jpg",
            "description" => "tid_correfoc_bestiari_bou_desc"
        );

        $sectionElements = array($asmodeu, $vibria, $drac, $gargola, $mulassa, $nassutja, $collllarg, $bou);

        return $this->render('web/correfoc-page-with-sections.html.twig', ['genericInfo' => $genericInfo, 'sectionElements' => $sectionElements]);
    }

    public function figuresAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function musicaAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function tabalersAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function quantsbandAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function sacAction()
    {
        return $this->render('web/correfoc.html.twig');
    }

    public function seguretatAction()
    {
        return $this->render('web/correfoc.html.twig');
    }
}