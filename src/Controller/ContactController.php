<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $emailTo =  "braunschweig.dubost@gmail.com";

            $message = (new \Swift_Message)
                    ->setSubject($data['Objet'])
                    ->setFrom($data['Email'])
                    ->setTo($emailTo)
                    ->setBody($data['Message'],'text/plain')
            ;

            $mailer->send($message);

            $this->addFlash(
                'success',
                'Votre email a bien été envoyé ! Nous vous répondrons dans les plus brefs délais'
            );
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
