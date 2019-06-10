<?php
namespace App\Controller;

use App\Form\ContacteType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContacteController extends AbstractController
{
    public function contacteAction()
    {
        $form = $this->createForm(ContacteType::class);
        return $this->render('web/contacte.html.twig', ['our_form' => $form->createView()]);
    }
}