<?php
namespace AppBundle\Form\PlaceTransformer;

use AppBundle\Entity\Place;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;

class TransformerClass implements DataTransformerInterface
{
    private $manager;

    /**
     * TransformerClass constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager=$manager;
    }

    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function transform($value)
    {
        $res=array();
        foreach ($value as $place){
            $res[]=$place->getNumPlace();
        }
        $value=join('-',$res);
        return $value;
    }

    /**
     * @param mixed $value
     * @return ArrayCollection
     */
    public function reverseTransform($value)
    {
        $tempArr=explode('-',$value);
        $res=new ArrayCollection();
        foreach ($tempArr as $arr){
            $place=$this->manager->getRepository('AppBundle:Place')->findAll();
            if(!$place){
                $place=new Place();
                $place->setNumPlace($arr);
            }
            $res->add($place);
        }
        return $res;
    }
}