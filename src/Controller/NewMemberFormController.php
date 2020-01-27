<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\SignUp;

class NewMemberFormController extends AbstractController
{
    public function registerNewMember(Request $request, ValidatorInterface $validator, \Swift_Mailer $mailer)
    {
        $formErrors = [];

        $signUpUser = new SignUp();
        $signUpUser->fill($request->request->get('user'));
        $signUpUserErrors = $signUpUser->validate($validator);

        $signUpParentalUser = new SignUp();
        $signUpParentalUser->fill($request->request->get('parentalUser'));
        $signUpParentalUserErrors = $signUpParentalUser->validate($validator);

        if(count($signUpUserErrors) > 0) 
        {
            $formErrors['user'] = $signUpUserErrors;
        }

        if($signUpUser->isUnderaged() && count($signUpParentalUserErrors) > 0) 
        {
            $formErrors['parentalUser'] = $signUpParentalUserErrors;
        }

        if($formErrors) {
            return new JsonResponse($formErrors);
        }
        else {
            $data = [
                'user' => $signUpUser->toArray()
            ];
    
            if($signUpUser->isUnderaged())
            {
                $data += ["parentalUser" => $signUpParentalUser->toArray()];
            }
    
            $message = (new \Swift_Message('Test Formulari Nou Membre'))
                ->setFrom('xaldiga@xaldiga.cat')
                ->setTo('xaldigatallerdefestes@gmail.com')
                ->setBody(
                    $this->renderView(
                        'web/signup-form-email.html.twig',
                        $data
                    ),
                    'text/html'
                );
            
            $mailer->send($message);

            $message = (new \Swift_Message('Test Usuari Registrat'))
                ->setFrom('xaldiga@xaldiga.cat')
                ->setTo($signUpUser->getEmail())
                ->setBody(
                    $this->renderView('web/signup-copy-email.html.twig'),
                    'text/html'
                );
            
            $mailer->send($message);
        }

        return new JsonResponse([
            'success' => 'Thank you for registering'
        ]);
    }

    public function newMemberFormAction()
    {
        return $this->render('web/new-member-form.html.twig');
    }
}