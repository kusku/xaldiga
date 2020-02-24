<?php
namespace App\Controller\Intranet;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IntranetController extends AbstractController
{
    public function intranetAction()
    {
        return $this->render('intranet/main.html.twig');
    }
}