<?php
namespace WdgImageGallery\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="WdgImageGallery\Repository\Album")
 * @ORM\Table(name="wdgimagegallery_albums")
 */
class Album extends \WdgBase\Doctrine\Entity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    protected $title;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    protected $slug;
    
    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="FileBank\File")
     */
    protected $Files;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->Files = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $title
     * @return \WdgImageGallery\Entity\Album
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $slug
     * @return \WdgImageGallery\Entity\Album
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Get files.
     *
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * Add a image to album.
     *
     * @param \FileBank\File $Image
     *
     * @return void
     */
    public function addImage(\FileBank\File $Image)
    {
        $this->Images[] = $Image;
        
        return $this;
    }
}
