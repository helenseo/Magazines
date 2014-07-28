<?php
namespace Magazines\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
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
    protected $filename;

    /**
     * @ORM\Column(name="updated_at",type="datetime",length=255)
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="created_at",type="datetime",length=255)
     */
    protected $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="Comment",cascade={"persist","remove"})
     * @JoinTable(name="image_comment",
     *   joinColumns={@JoinColumn(name="image_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="comment_id",referencedColumnName="id")}
     * )
     */
    protected $comments;

    /**
     * @ORM\ManyToMany(targetEntity="Magazine")
     * @JoinTable(name="magazine_image",
     *   joinColumns={@JoinColumn(name="image_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="magazine_id",referencedColumnName="id")}
     * )
     */
    protected $magazines;

    /**
     * @ORM\ManyToMany(targetEntity="Article")
     * @JoinTable(name="article_image",
     *   joinColumns={@JoinColumn(name="image_id",referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="article_id",referencedColumnName="id")}
     * )
     **/
    protected $articles;

    public function __construct()
    {
        $this->setComments(new ArrayCollection());
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

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
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

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    public function getMagazines()
    {
        return $this->magazines;
    }

    public function getMagazine()
    {
        $magazine = null;
        $magazines = $this->getMagazines();
        foreach ($magazines as $magazine) {
            break;
        }
        return $magazine;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function getArticle()
    {
        $article = null;
        $articles = $this->getArticles();
        foreach ($articles as $article) {
            break;
        }
        return $article;
    }
}
