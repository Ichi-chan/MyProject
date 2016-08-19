<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Entity\Place;
//use AppBundle\Entity\Mail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Symfony\Component\HttpKernel\Tests;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ChoicePlaceFormType;
use AppBundle\Form\Type\ModalFormType;

// сделать выборку по неск форматам измнеить по ид фильму и юзеру,
// изменить добавление в базу, переработать вывод занятых фильмов
// сделать личный кабинет пользователя и давать ему информацию по фильмам на кот он " подписан" места и т д
//
class MailController extends Controller

{
    /**
     * @Route("/films/pl/{id}", name="place_e")
     * @Template("@App/MainPage/place.html.twig")
     * @param Film $film
     * @param Request $request
     * @return array
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function placeAction(Film $film, Request $request)
    {
        $places = $this->getDoctrine()
            ->getRepository(Place::class)
            ->findByFilms($film->getId());
        $mas=',';
        /** @var Place $place */
        foreach ($places as $place)
        {
            $mas=$mas.','.$place->getNumPlace();
        }
        $form = $this->createForm(ChoicePlaceFormType::class, null, ['places' => $mas]);
        $modal_form = $this->createForm(ModalFormType::class);
        $modal_form->handleRequest($request);
        $id = $film->getId();




        if ($modal_form->isValid()) {

            $pl2 = $modal_form->get('temp')->getData();
            $film = $this->getDoctrine()
                ->getRepository('AppBundle:Film')
                ->find($id);

            /** @var Place $place */
            $place = $this->getDoctrine()
                ->getRepository(Place::class)
                ->findOneBy(array('films'=>$id,'email'=>$modal_form->get('mail')->getData()));

            $name = $modal_form->get('name')->getData();//обращение к конкретному полю в форме и получение из него данных
            $mail = $modal_form->get('mail')->getData();
            if (!$place) {
                $place = new Place();
                $place->setFilms($film);
                $place->setNumPlace($pl2);
                $place->setEmail($mail);

            } else {
                $places = $place->getNumPlace();
                $newPlace = $places . ',' . $pl2;
                $place->setNumPlace($newPlace);
                $place->setEmail($mail);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($place);
            $em->flush();
            /**
             * @var \Swift_Mime_Message $message
             */
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('ichichanshka@gmail.com')
                ->setTo('exorcist1@mail.ru')
                ->setBody('hello ' . $name . ' u are reserved placeses ' . $pl2 . ' this message will be send on email ' . $mail);

            $mailer = $this->get('mailer');

            $mailer->send($message);
            /**
             * @var \Swift_Transport $spool
             */
            $spool = $mailer->getTransport()->getSpool();
            $transport = $this->get('swiftmailer.transport.real');

            $spool->flushQueue($transport);
            return $this->redirectToRoute('film_list');
        }

        return array('film' => $film, 'form' => $form->createView(), 'modalForm' => $modal_form->createView());// return new responce
    }

}