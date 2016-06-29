<?php
namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use AppBundle\Form\CategoryAddForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CategoryController
 * @package AppBundle\Controller
 */
class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category_list")
     * @return array
     */
    public function categoryAction()
    {
        $categories=$this->getDoctrine()
        ->getRepository('Category.php')
        ->findAll();
        return array('category'=>$categories);
    }

    /**
     * @Route("/category/create", name="category_create")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createCategory(Request $request)
    {
        $category=new Category();
        $form=$this->createForm(CategoryAddForm::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($category);
            $em->flush();
            $this->addFlash('notice', 'Category Added');

            return $this->redirectToRoute('film_list');
        }

        return array('form' => $form->createView());
    }
}