<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionPageOnlyDescriptionController extends AbstractController
{
    public function tabalersAction()
    {
        $genericInfo = array(
            "sectionFolder" => "tabalers",
            "title" => "tid_tabalers_title",
            "description" => "tid_tabalers_main_desc",
            "mainImageDescription" => "tid_tabalers_main_image_desc"
        );

        return $this->render('web/section-page-only-description.html.twig', ['genericInfo' => $genericInfo]);
    }

    public function histrionsAction()
    {
        $genericInfo = array(
            "sectionFolder" => "histrions",
            "title" => "tid_histrions_title",
            "description" => "tid_histrions_main_desc",
            "mainImageDescription" => "tid_histrions_main_image_desc"
        );

        return $this->render('web/section-page-only-description.html.twig', ['genericInfo' => $genericInfo]);
    }
}