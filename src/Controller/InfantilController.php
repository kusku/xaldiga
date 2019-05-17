<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfantilController extends AbstractController
{
    public function infantilAction()
    {
        $infantilElements;

        $genericInfo = array(
            "title" => "tid_infantil_title",
            "description" => "tid_infantil_main_desc"
        );

        $diablons = array(
            "title" => "tid_infantil_diablons_title",
            "url" => "/images/infantil/diablons.jpg",
            "description" => "tid_infantil_diablons_desc"
        );

        $tabalons = array(
            "title" => "tid_infantil_tabalons_title",
            "url" => "/images/infantil/tabalons.jpg",
            "description" => "tid_infantil_tabalons_desc"
        );

        $tremenda = array(
            "title" => "tid_infantil_tremenda_title",
            "url" => "/images/infantil/tremenda.jpg",
            "description" => "tid_infantil_tremenda_desc"
        );

        $traqueta = array(
            "title" => "tid_infantil_traqueta_title",
            "url" => "/images/infantil/traqueta.jpg",
            "description" => "tid_infantil_traqueta_desc"
        );

        $bou = array(
            "title" => "tid_infantil_bou_title",
            "url" => "/images/infantil/bou.jpg",
            "description" => "tid_infantil_bou_desc"
        );

        $ceptrot = array(
            "title" => "tid_infantil_ceptrot_title",
            "url" => "/images/infantil/ceptrot.jpg",
            "description" => "tid_infantil_ceptrot_desc"
        );

        $infantilElements = array($diablons, $tabalons, $tremenda, $traqueta, $bou, $ceptrot);

        return $this->render('web/infantil.html.twig', ['genericInfo' => $genericInfo, 'infantilElements' => $infantilElements]);
    }
}