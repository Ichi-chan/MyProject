<?php
namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use AppBundle\Entity\Film;
use AppBundle\Entity\Place;
use AppBundle\Entity\User;
use AppBundle\Form\ChoicePlaceFormType;
use AppBundle\Form\FilmAddFormType;
use AppBundle\Form\Type\ModalFormType;
use AppBundle\Form\Type\UserFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MainPageController extends Controller
{
    /**
     * @Route("/user/{id}", name="user_action")
     * @Template("@App/MainPage/user.thml.twig")
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @internal param User $user
     */
    public function userAction(User $user, Request $request)
    {
        //$repository=$this->getDoctrine()
        //->getRepository('AppBundle:Place')
        //    ->findByEmail($user->getEmail());
        $form=$this->createForm(UserFormType::class);
        $form->handleRequest($request);
        return array('form'=>$form->createView());
    }
}