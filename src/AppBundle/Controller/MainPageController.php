<?php
namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use AppBundle\Entity\Film;
use AppBundle\Form\FilmAddFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MainPageController extends Controller
{
    /**
     * @Route("/films", name="film_list")
     * @Template()
     *
     * @param Request $request
     * @return array
     */
    public function listAction(Request $request)
    {
        $date=new \DateTime();
        $newdate= clone $date->modify('+2 weeks');
        $lastdate=$date->modify('-4 weeks');
        $repository=$this->getDoctrine()
            ->getRepository('AppBundle:Film');
        $qb=$repository->createQueryBuilder('t')
            ->where('t.releasInWord >:term')
            ->andWhere('t.releasInWord <:term2')
            ->setParameters(['term'=>$lastdate, 'term2'=>$newdate])
            ->getQuery();
            $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page',1)
            ,2
        );
        return array('pagination' => $pagination);

    }

    /**
     * @Route("/films/soon", name="film_soon_list")
     * @Template("@App/MainPage/list.html.twig")
     *
     * @param Request $request
     * @return array
     */
    public function soonListAction(Request $request)
    {
        $date=new \DateTime();
        $repository=$this->getDoctrine()
            ->getRepository('AppBundle:Film');
        $qb=$repository->createQueryBuilder('t')
            ->where('t.releasInWord >:term')
            ->setParameter('term', $date->modify('+2 weeks'))
            ->getQuery();
           $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page',1)
            ,2
        );
        return array('pagination' => $pagination);

    }

    /**
     * @Route("/films/archive", name="film_archive_list")
     * @Template("@App/MainPage/list.html.twig")
     *
     * @param Request $request
     * @return array
     */
    public function archiveAction(Request $request)
    {

        $date=new \DateTime();
        $newdate=new \DateTime();
        $lastdate= $date->modify('-6 years');
        $repository=$this->getDoctrine()
            ->getRepository('AppBundle:Film');
        $qb=$repository->createQueryBuilder('t')
            ->where('t.releasInWord >:term')
            ->andWhere('t.releasInWord<=:term2')
            ->setParameters(['term'=> $lastdate,'term2'=>$newdate])
            ->getQuery();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page',1)
            ,2
        );
        return array('pagination' => $pagination);
    }
    /**
     * @Route("/films/append", name="films_append")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $film=new Film();
        $this->get('app.form.film.add.form');
        $form=$this->createForm(FilmAddFormType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            $this->addFlash('notice', 'Film Added');

            return $this->redirectToRoute('film_list');
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/films/details/{id}",name="films_details")
     * @Template()
     * @param Film $film
     * @return array
     * @internal param Request $request
     */
    public function detailsAction(Film $film)
    {
        return array('film' => $film);
    }

    /**
     * @Route("/film/delete/{id}",name="film_delete")
     * @param Film $film
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Film $film)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($film);
        $em->flush();
        $this->addFlash('notice', 'FilmRemove');

        return $this->redirectToRoute('film_list');
    }

    /**
     * @Route("/film/edit/{id}",name="film_edit")
     * @Template()
     * @param Film    $film
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction(Film $film, Request $request)
    {
        $form=$this->createForm(FilmAddFormType::class, $film);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $this->addFlash('notice', 'Film Update');

            return $this->redirectToRoute('film_list');

        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/film/result/category/{id}", name="choose_category")
     * @Template("AppBundle:MainPage:list.html.twig")
     * @param Category $id
     * @return array
     * @internal param Request $request
     */
    public  function categoryAction(Category $id)
    {
        return array('films'=>$id->getFilms());
    }
    /**
     * @Route("/about", name="about_list")
     * @Template()
     */
   public function aboutAction()
   {
       
   }
}