<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Entity\Place;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Tests;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class MailController extends Controller
{
    /**
     * @Route("/film/place_reserved/mail", name="send_mile")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @internal param Request $request
     */
    public function sendEmailAction()
    {
        $pl = $_POST['modal_form'];
        $pl2 = $pl['temp'];
        $id = $_REQUEST['id'];
        $film = $this->getDoctrine()
            ->getRepository('AppBundle:Film')
            ->find($id);
        /** @var Place $place */
        $place = $this->getDoctrine()
            ->getRepository(Place::class)
            ->findOneByFilms($id);

        if (!$place) {
            $place = new Place();
            $place->setFilms($film);
            $place->setNumPlace($pl2);

        } else {
            $places = $place->getNumPlace();
            $newPlace = $places . ',' . $pl2;
            $place->setNumPlace($newPlace);

        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();

        $name = $pl['name'];
        $mail = $pl['mail'];
        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('ichichanshka@gmail.com')
            //->setSender('ichichanshka@gmail.com')
            ->setTo('ichichanuska@gmail.com')
          //  ->setBcc()
            ->setBody('hello ' . $name . ' u are reserved placeses ' . $pl2 . ' this message will be send on email ' . $mail);


        //$this->get('mailer')->send($message);
        $mailer = $this->get('mailer');

        $mailer->send($message);

        $spool = $mailer->getTransport()->getSpool();
        $transport = $this->get('swiftmailer.transport.real');

        $spool->flushQueue($transport);

        //  }
        return $this->redirectToRoute('film_list');
    }
}