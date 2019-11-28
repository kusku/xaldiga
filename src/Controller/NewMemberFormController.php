<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\SignUp;

class NewMemberFormController extends AbstractController
{
    public function registerNewMember(Request $request, ValidatorInterface $validator)
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