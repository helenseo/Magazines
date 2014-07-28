<?php
namespace Magazines\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="magazine")
 */
class Magazine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $name;

    /**
     * @ORM\Column(name="updated_at",type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="created_at",type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="string",length=20)
     */
    protected $stat = 'active';

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="magazine")
     */
    protected $articles;

    /**
     * @ORM\ManyToMany(targetEntity="Image")
     * @JoinTable(name="magazine_image",
     *   joinColumns={@JoinColumn(name="magazine_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="image_id",referencedColumnName="id")}
     * )
     **/
    protected $images;

    public function __construct()
    {
        $this->setArticles(new ArrayCollection());
        $this->setImages(new ArrayCollection());
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getStat()
    {
        return $this->stat;
    }

    public function setStat($stat)
    {
        $this->stat = $stat;
        return $this;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    public function getImage()
    {
        $image = null;
        $images = $this->getImages();
        foreach ($this->images as $image) {
            break;
        }
        return $image;
    }
}
