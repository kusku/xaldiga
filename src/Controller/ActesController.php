<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActesController extends AbstractController
{
    public function correaiguaAction()
    {
        return $this->render('web/correaigua.html.twig');
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
        return $this->render('web/passatge-terror.html.twig');
    }
}