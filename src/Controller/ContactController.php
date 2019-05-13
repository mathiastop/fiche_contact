<?php

namespace App\Controller;

use App\Entity\Communication;
use App\Entity\Departments;
use App\Entity\User;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function sendMail($contactFormData, \Swift_Mailer $mailer)
    {
        $data = $this->getDoctrine()->getRepository(Departments::class)->findAll();

        $message = (new \Swift_Message('You Got Mail!'))
            ->setFrom('fiche.contact0000@gmail.com')
            ->setTo($data[$contactFormData['Departement:']]->getMail())
            ->setBody($contactFormData['Message:'], 'text/plain');
        $mailer->send($message);
    }

    public function addUser(ObjectManager $manager, $contactFormData)
    {
        $user = new User();
        $user->setName($contactFormData['Nom:']);
        $user->setSurname($contactFormData['Prenom:']);
        $user->setMail($contactFormData['Mail:']);
        $user->setMessage($contactFormData['Message:']);
        $manager->persist($user);
        $manager->flush();
    }

    public function index(Request $request, \Swift_Mailer $mailer, ObjectManager $manager)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $this->addUser($manager, $contactFormData);
            $this->sendMail($contactFormData, $mailer);
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact.html.twig', ['our_form' => $form->createView()]);
    }
}
