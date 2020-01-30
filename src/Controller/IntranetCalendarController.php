<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IntranetCalendarController extends AbstractController
{
    public function showCalendarListAction()
    {
        return $this->render('intranet/calendar/calendar.html.twig');
    }

}