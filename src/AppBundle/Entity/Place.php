<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Place
 * @package AppBundle\Entity
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 */

class Place
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="num_place", type="string", length=10)
     */
    private $num_place;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Film", inversedBy="place")
     * @ORM\JoinColumn(name="film_num", referencedColumnName="id")
     */
    private $films;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNumPlace()
    {
        return $this->num_place;
    }

    /**
     * @param string $num_place
     */
    public function setNumPlace($num_place)
    {
        $this->num_place = $num_place;
    }

    /**
     * @return mixed
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param mixed $films
     */
    public function setFilms($films)
    {
        $this->films = $films;
    }


}