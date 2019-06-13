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
                    $contactFormData['message'],
                    'text/plain'
                );
            $logger = new \Swift_Plugins_Loggers_ArrayLogger();
            $mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($logger));
            
            if(!$mailer->send($message, $errors))
            {
                echo "Error:" . $logger->dump();
                $contactFormData['message'] = $logger->dump();
            }
            else
            {
                echo "Succesful mail";
                $contactFormData['message'] = 'success';
            }

            return $this->redirectToRoute('contacte');
        }

        return $this->render('web/contacte.html.twig', ['our_form' => $form->createView()]);
    }
}