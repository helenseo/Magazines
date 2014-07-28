<?php
namespace Magazines\Service;

use Magazines\Entity\Comment;

class MagazineService
{
    protected $em;

    public function getEntityManager()
    {
        return $this->em;
    }

    public function setEntityManager($em)
    {
        $this->em = $em;
        return $this;
    }

    public function getMagazines()
    {
        return $this->getEntityManager()
            ->getRepository('Magazines\Entity\Magazine')
            ->findAll();
    }

    public function getMagazine($id)
    {
        return $this->getEntityManager()->find('Magazines\Entity\Magazine', $id);
    }

    public function getArticle($id)
    {
        return $this->getEntityManager()->find('Magazines\Entity\Article', $id);
    }

    public function getImage($id)
    {
        return $this->getEntityManager()->find('Magazines\Entity\Image', $id);
    }

    public function saveComment($data)
    {
        $item = ('article' == $data['on'])
            ? $this->getArticle($data['id'])
            : $this->getImage($data['id']);

        $comment = new Comment();
        $comment->setName($data['name'])
            ->setEmail($data['email'])
            ->setUrl($data['url'])
            ->setComment($data['comment'])
            ->setCreatedAt(new \DateTime());

        $item->getComments()->add($comment);
        $this->getEntityManager()->flush();
    }
}