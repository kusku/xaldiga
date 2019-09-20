<?php
namespace App\Controller;

use App\Form\ContacteType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class ContacteController extends AbstractController
{
    private $emailsMap = [
        'secretaria' => 'secretaria@xaldiga.cat',
        'tresoreria' => 'tresoreria@xaldiga.cat',
        'diables' => 'diablesmanresa@xaldiga.cat',
        'histrions' => 'histrions@xaldiga.cat',
        'infantil' => 'xaldigainfantil@gmail.com',
        'tabalers' => 'cap.tabalers@gmail.com'
    ];

    public function contacteAction(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContacteType::class);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $email = $this->emailsMap[$contactFormData['section']];

            $message = (new \Swift_Message('Test Formulari Contacte Nova Web'))
                ->setFrom('xaldiga@xaldiga.cat')
                ->setTo($email)
                ->setCc('xaldigatallerdefestes@gmail.com')
                ->setBody(
                    $this->renderView(
                        'web/contacte-form-email.html.twig',
                        [
                            'name' => $contactFormData['name'],
                            'email' => $contactFormData['from'],
                            'phone' => $contactFormData['phone'],
                            'message' => $contactFormData['message'],
                        ]
                    ),
                    'text/html'
                );
            
            $mailer->send($message);

            return $this->redirectToRoute('contacte');
        }

        return $this->render('web/contacte.html.twig', ['our_form' => $form->createView()]);
    }

    public function newMemberAction()
    {
        return $this->rendeR('web/new-member-form.html.twig');
    }
}