<?php
namespace App\Controller;

use App\Form\ContacteType;
use App\Form\NewUserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\SignUp;

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

    public function newUserAction(Request $request, ValidatorInterface $validator)
    {
        $signUp = new SignUp();

        $signUp->setName($request->request->get('name'));

        $nameError = $validator->validateProperty($signUp, 'name');

        if(count($nameError) > 0) {
            return new JsonResponse(['nameError' => $nameError[0]->getMessage()]);
        }

        return new JsonResponse([
            'success_message' => 'Thank you for registering'
        ]);
    }

    public function newMemberAction()
    {
        return $this->rendeR('web/new-member-form.html.twig');
    }

    private function getJson(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new HttpException(400, 'Invalid json');
        }

        return $data;
    }
}