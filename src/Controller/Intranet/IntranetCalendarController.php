<?php
namespace App\Controller\Intranet;

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

    public function handleForm(Request $request, $form)
    {
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

            return true;
        }

        return false;
    }

    public function createCalendarEventAction(Request $request)
    {
        $form = $this->createForm(CreateEventType::class);

        if ($this->handleForm($request, $form))
        {
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

    public function editEvent(int $eventId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Event::class);
        $event = $repository->find($eventId);
        if($event)
        {
            $form = $this->createForm(CreateEventType::class);
            $form->get('title')->setData($event->getTitle());
            $form->get('date')->setData($event->getTs());
            $form->get('address')->setData($event->getAddress());
            $form->get('city')->setData($event->getCity());
            $form->get('description')->setData($event->getDescription());

            return $this->render('intranet/calendar/edit-calendar.html.twig', ['form' => $form->createView()]);
        }

        return new JsonResponse(['events' => $event]);
    }
}