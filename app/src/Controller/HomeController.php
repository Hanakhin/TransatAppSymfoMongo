<?php

namespace App\Controller;

use App\Form\Type\ContactFormType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(DocumentManager $dm): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function formContact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            try {
                $email = (new Email())
                    ->from($formData['email'])
                    ->to('snow44111@gmail.com')
                    ->subject($formData['subject'])
                    ->text($formData['message']);

                $mailer->send($email);

                $this->addFlash('success', 'Message envoyé avec succès');

                return $this->redirectToRoute('app_contact');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'envoi du message : ' . $e->getMessage());
            }
        }

        return $this->render('home/contact.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}

