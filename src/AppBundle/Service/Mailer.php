<?php

namespace AppBundle\Service;


use AppBundle\Entity\Reservation;

class Mailer
{

    private $mailer;
    private $templating;
    private $from ='reservation@flyaround.com';
    private $reply = "test@test.fr";
    private $name = "Equipe FlyAround";

    /**
     * Mailer constructor.
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $templating
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMail($to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($this->from,$this->name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo($this->reply,$this->name)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }
    public function PilotMail(Reservation $reservation)
    {
        $subject = 'Nouvelle Réservation';
        $to = $reservation->getFlight()->getPilot()->getEmail();
        $body =  $this->templating->render('mail\pilotMail.html.twig',[
            'reservation' => $reservation]);
        $this->sendMail($to,$subject,$body);
    }

    public function PassengerMail(Reservation $reservation)
    {
        $subject = 'Réservation Flyaround';
        $to = $reservation->getPassenger()->getEmail();
        $body =  $this->templating->render('mail\passengerMail.html.twig',[
            'reservation' => $reservation]);
        $this->sendMail($to,$subject,$body);
    }

}


