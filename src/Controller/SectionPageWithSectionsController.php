<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionPageWithSectionsController extends AbstractController
{
    public function infantilAction()
    {
        $genericInfo = array(
            "sectionFolder" => "infantil",
            "title" => "tid_infantil_title",
            "description" => "tid_infantil_main_desc",
            "mainImageDescription" => "tid_infantil_main_image_desc"
        );

        $diablons = array(
            "title" => "tid_infantil_diablons_title",
            "imageName" => "diablons.jpg",
            "description" => "tid_infantil_diablons_desc"
        );

        $tabalons = array(
            "title" => "tid_infantil_tabalons_title",
            "imageName" => "tabalons.jpg",
            "description" => "tid_infantil_tabalons_desc"
        );

        $tremenda = array(
            "title" => "tid_infantil_tremenda_title",
            "imageName" => "tremenda.jpg",
            "description" => "tid_infantil_tremenda_desc"
        );

        $traqueta = array(
            "title" => "tid_infantil_traqueta_title",
            "imageName" => "traqueta.jpg",
            "description" => "tid_infantil_traqueta_desc"
        );

        $bou = array(
            "title" => "tid_infantil_bou_title",
            "imageName" => "bou.jpg",
            "description" => "tid_infantil_bou_desc"
        );

        $ceptrot = array(
            "title" => "tid_infantil_ceptrot_title",
            "imageName" => "ceptrot.jpg",
            "description" => "tid_infantil_ceptrot_desc"
        );

        $sectionElements = array($diablons, $tabalons, $tremenda, $traqueta, $bou, $ceptrot);

        return $this->render('web/section-page-with-sections.html.twig', ['genericInfo' => $genericInfo, 'sectionElements' => $sectionElements]);
    }

    public function diablesAction()
    {
        $genericInfo = array(
            "sectionFolder" => "diables",
            "title" => "tid_diables_title",
            "description" => "tid_diables_main_desc",
            "mainImageDescription" => "tid_diables_main_image_desc"
        );

        $diables = array(
            "title" => "tid_diables_diables_title",
            "imageName" => "diables.jpg",
            "description" => "tid_diables_diables_desc"
        );

        $diablesa = array(
            "title" => "tid_diables_diablesa_title",
            "imageName" => "diablesa.jpg",
            "description" => "tid_diables_diablesa_desc"
        );

        $ceptrot = array(
            "title" => "tid_diables_ceptrot_title",
            "imageName" => "ceptrot.jpg",
            "description" => "tid_diables_ceptrot_desc"
        );

        $sectionElements = array($diables, $diablesa, $ceptrot);

        return $this->render('web/section-page-with-sections.html.twig', ['genericInfo' => $genericInfo, 'sectionElements' => $sectionElements]);
    }
}