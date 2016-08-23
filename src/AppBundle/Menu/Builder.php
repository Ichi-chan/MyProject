<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use AppBundle\Entity\User;


class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param FactoryInterface $factory
     */
    public function mainMenu(FactoryInterface $factory)
    {


        //$userid=$this->getUser();
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Today', array('route' => 'film_list'));
        $menu->addChild('Soon', array('route' => 'film_soon_list'));
        $menu->addChild('Archive', array('route' => 'film_archive_list'));
        $menu->addChild('About', array('route' => 'about_list'));
        $menu->addChild('AddFilm', array('route' => 'films_append'));
        // $menu->addChild('Accaunt',array('route'=>'fos_user_security_login'));
        //if(!$this->container->get('security.token_storage')->getToken()->getUser()->getId())
        {
            //
        }
        $tok=$this->container->get('security.token_storage')->getToken()->getUser();
        //else {
        //if (!$this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
       // if(!$this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')){
          if($tok=='anon.'){
            $menu->addChild('Account', array('route' => 'fos_user_security_login'));
        } //else {}
        else{
            $menu->addChild('Account', array('route' => 'user_action'));//,
               // 'routeParameters' => ['user' => $tok->getId()]));
        }
        return $menu;
    }
}
