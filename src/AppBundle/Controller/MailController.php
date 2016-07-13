<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Tests;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MailController extends Controller
{
    /**
     * @Route("/film/place_reserved/mail", name="send_mile")
     *
     */
    public function sendEmailAction()
    {
        /* $text = "asdasd";
          $mailer=$this->get('app.mailer');
          $mailer->send('ichichanshka@gmail.com',"aasdasdasd");
         $post = Request::createFromGlobals();

         if ($post->request->has('save changes'))
         {
         $name = $post->request->get('name');
         $message = \Swift_Message::newInstance()
             ->setSubject('Hello Email')
             ->setFrom('AmaDocta')
             ->setTo('ichichanshka@gmail.com');

         $this->get('mailer')->send($message);
     }*/
        $post = Request::createFromGlobals();
       // if ($post->request->has('save changes')) {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $place = $_POST['temp'];
        $mes="'hello '$name' u are reserved placeses ' $place ' this message will be send on email '$mail";
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('ichichanshka@gmail.com')
                ->setTo('ichichanshka@gmail.com')
                ->setBody('hello '+$name+' u are reserved placeses ' +$place+ ' this message will be send on email '+$mail);

        //->setBody(
       // $this->renderView(
       //     '@App/MainPage/modal_form.html.twig'))
    //;

        $this->get('mailer')->send($message);

      //  }
        return $this->redirectToRoute('film_list');
    }
}