<?php
namespace  AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;




/**
 * Class Film
 * @package AppBundle\Entity
 * @ORM\Table(name="films")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MainPageRepository")
 * @Vich\Uploadable
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name",type="string",length=255)
     */
    private $name;
    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", inversedBy="films", cascade={"persist"})
     * @ORM\JoinTable(name="films_categories")
     */
    private $category;
    /**
     * @var string
     *
     * @ORM\Column(name="producer", type="string", length=255)
     */
    private $producer;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="released", type="datetime")
     */
    private $released;
    /**
     * @var string
     *
     * @ORM\Column(name="mainrole", type="string", length=255)
     */
    private $mainrole;
    /**
     * @var string
     *
     * @ORM\Column(name="age_qualification", type="string", length=255)
     */
    private $age_qualification;
    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;
    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=20)
     */
    private $format;
    /**
     * @var string
     *
     * @ORM\Column(name="hole", type="string", length=100)
     */
    private $hole;
    /**
     * @var string
     *
     * @ORM\Column(name="annotation", type="string", length=5000)
     */
    private $annotation;


    /**
     * @var \DateTime
     * @ORM\Column(name="realeasInWorld",type="datetime",)
     */
    private $releasInWord;
    
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="films_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;


    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;



    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Film
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }


    /**
     * @param string $imageName
     *
     * @return Film
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param ArrayCollection $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    /**
     * @return string
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @param string $producer
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    /**
     * @return string
     */
    public function getMainrole()
    {
        return $this->mainrole;
    }

    /**
     * @param string $mainrole
     */
    public function setMainrole($mainrole)
    {
        $this->mainrole = $mainrole;
    }

    /**
     * @return int
     */
    public function getAgeQualification()
    {
        return $this->age_qualification;
    }

    /**
     * @param int $age_qualification
     */
    public function setAgeQualification($age_qualification)
    {
        $this->age_qualification = $age_qualification;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getHole()
    {
        return $this->hole;
    }

    /**
     * @param string $hole
     */
    public function setHole($hole)
    {
        $this->hole = $hole;
    }

    /**
     * @return string
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param string $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     * @return \DateTime
     */
    public function getReleased()
    {
        return $this->released;
    }

    /**
     * @param \DateTime $released
     */
    public function setReleased($released)
    {
        $this->released = $released;
    }
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
     * @return \DateTime
     */
    public function getReleasInWord()
    {
        return $this->releasInWord;
    }

    /**
     * @param \DateTime $releasInWord
     */
    public function setReleasInWord($releasInWord)
    {
        $this->releasInWord = $releasInWord;
    }
    public function __construct()
    {
        $this->updatedAt=new \DateTime('now');
        $this->category=new ArrayCollection();
    }

}