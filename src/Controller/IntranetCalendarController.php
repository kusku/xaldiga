<?php
namespace App\Controller;

use App\Entity\Event;
use App\Form\CreateEventType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IntranetCalendarController extends AbstractController
{
    public function showCalendarListAction()
    {
        return $this->render('intranet/calendar/calendar.html.twig');
    }

    public function createCalendarEventAction(Request $request)
    {
        $form = $this->createForm(CreateEventType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $event = new Event();
            $event->setTitle($formData['title']);
            $event->setDescription($formData['description']);
            $event->setAddress($formData['address']);
            $event->setCity($formData['city']);
            $event->setTs($formData['date']);

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('intranet-calendar');
        }

        return $this->render('intranet/calendar/edit-calendar.html.twig', ['form' => $form->createView()]);
    }

    public function getEvents(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findAll();

        $jsonContent = array();
        foreach($events as $event)
        {
            array_push($jsonContent, $event->toArray());
        }

        return new JsonResponse(['events' => $jsonContent]);
    }

    public function deleteEvent(int $eventId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Event::class);
        $event = $repository->find($eventId);
        if($event)
        {
            $entityManager->remove($event);
            $entityManager->flush();
        }

        return new JsonResponse();
    }
}