<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CorrefocController extends AbstractController
{
    public function correfocAction()
    {
        return $this->render('web/correfoc.html.twig');
    }
}