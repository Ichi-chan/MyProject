<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;


class Builder implements  ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param FactoryInterface $factory
     */
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Today', array('route' => 'film_list'));
        $menu->addChild('Soon', array('route' => 'film_soon_list'));
        $menu->addChild('Archive', array('route' => 'film_archive_list'));
        $menu->addChild('About', array('route' => 'about_list'));
        $menu->addChild('AddFilm', array('route' => 'films_append'));
        return $menu;
    }
}
