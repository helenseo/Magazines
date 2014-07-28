<?php
namespace Magazines\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="magazine_id",type="integer")
     */
    protected $magazineId;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     */
    protected $body;

    /**
     * @ORM\Column(name="published_at",type="datetime")
     */
    protected $publishedAt;

    /**
     * @ORM\Column(name="updated_at",type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="created_at",type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Magazine", inversedBy="articles")
     */
    protected $magazine;

    /**
     * @ORM\Column(type="string",length=20)
     */
    protected $stat = 'draft';

    /**
     * @ORM\ManyToMany(targetEntity="Comment", cascade={"persist","remove"})
     * @JoinTable(name="article_comment",
     *   joinColumns={@JoinColumn(name="article_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="comment_id",referencedColumnName="id")}
     * )
     */
    protected $comments;

    /**
     * @ORM\ManyToMany(targetEntity="Image")
     * @JoinTable(name="article_image",
     *   joinColumns={@JoinColumn(name="article_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="image_id",referencedColumnName="id")}
     * )
     **/
    protected $images;

    public function __construct()
    {
        $this->setComments(new ArrayCollection());
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

    public function getMagazineId()
    {
        return $this->magazineId;
    }

    public function setMagazineId($magazineId)
    {
        $this->magazineId = $magazineId;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
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

    public function getMagazine()
    {
        return $this->magazine;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
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
