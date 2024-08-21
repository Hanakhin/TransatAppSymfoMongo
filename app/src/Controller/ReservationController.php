<?php

namespace App\Controller;

use App\Document\Reservation;
use App\Form\Type\ReservationType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/transat')]
class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request , DocumentManager $dm, ): Response
    {
        $reservation = new Reservation();
        $allReservations = $dm->getRepository(Reservation::class)->findAll();
        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $existingReservations = $dm->getRepository(Reservation::class)->findOneBy([
                'date' => $reservation->getDate(),
                'heureDebut' => $reservation->getHeureDebut(),
            ]);
            if ($existingReservations) {
                $this->addFlash('error', 'il existe deja une reservation a cette date/heure');
            }else{
                $reservation->setDate($form->get('date')->getData())
                    ->setPrix($form->get('prix')->getData())
                    ->setDate(($form->get('date')->getData()))
                    ->setHoraires($form->get('horaires')->getData())
                    ->setEmplacement($form->get('emplacement')->getData())
                    ->setNbTransat($form->get('nbTransat')->getData());
                $this->addFlash('success','Reservation effectuée avec succes');

                $dm->persist($reservation);
                $dm->flush();
                return $this->redirectToRoute('app_reservation');
            }

        }

        return $this->render('transat/reservation.html.twig', [
            'controller_name' => 'ReservationController',
            'form'=>$form->createView(),
            'reservations'=>$allReservations,
        ]);
    }

    #[Route('/pricing', name: 'app_pricing')]
public function pricing(): Response
    {

        return $this->render('transat/pricing.html.twig',[
            'controller_name' => 'ReservationController',
        ]);
    }
}
