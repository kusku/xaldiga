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

        $formErrors['user'] = $signUpUserErrors;
        $formErrors['parentalUser'] = $signUpParentalUserErrors;

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
        
        //$mailer->send($message);

        if($formErrors) {
            return new JsonResponse($formErrors);
        }

        return new JsonResponse([
            'success_message' => 'Thank you for registering'
        ]);
    }

    public function newMemberFormAction()
    {
        return $this->render('web/new-member-form.html.twig');
    }
}