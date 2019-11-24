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
        $signUp = new SignUp();

        $signUp->setName($request->request->get('name'));
        $signUp->setNif($request->request->get('nif'));

        $formErrors = $signUp->validate($validator);

        // $nameError = $validator->validateProperty($signUp, 'name');
        // $nifError = $validator->validateProperty($signUp, 'nif');

        // $formErrors = [];

        // if(count($nameError) > 0) {
        //    $formErrors['nameError'] = $nameError[0]->getMessage();
        // }
        
        // if(count($nifError) > 0) {
        //     $formErrors['nifError'] = $nifError[0]->getMessage();
        //  }

        if($formErrors) {
            return new JsonResponse($formErrors);
        }

        return new JsonResponse([
            'success_message' => 'Thank you for registering'
        ]);
    }

    public function newMemberFormAction()
    {
        return $this->rendeR('web/new-member-form.html.twig');
    }
}