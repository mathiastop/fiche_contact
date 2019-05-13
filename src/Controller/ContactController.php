<?php

namespace App\Controller;

use App\Entity\Communication;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom('no.replay@contact.fr')
                ->setTo($contactFormData['Mail:'])
                ->setBody($contactFormData['Message:'], 'text/plain');
            $mailer->send($message);
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact.html.twig', ['our_form' => $form->createView()]);
    }
}
