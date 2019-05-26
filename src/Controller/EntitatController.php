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
}