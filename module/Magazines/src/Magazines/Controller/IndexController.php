<?php
namespace Magazines\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Magazines\Form\CommentForm;

class IndexController extends AbstractActionController
{
    protected $magazineService;

    public function indexAction()
    {
        return array(
            'magazines' => $this->getMagazineService()->getMagazines(),
        );
    }

    public function magazineAction()
    {
        $magazineId = $this->params('id');
        $magazine = $this->getMagazineService()->getMagazine($magazineId);

        if (null == $magazine) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        return array(
            'magazine' => $magazine,
            'articles' => $magazine->getArticles(),
            'image' => $magazine->getImage(),
        );
    }

    public function articleAction()
    {
        $articleId = $this->params('id');
        $article = $this->getMagazineService()->getArticle($articleId);

        if (null == $article) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        return array(
            'article' => $article,
            'magazine' => $article->getMagazine(),
            'comments' => $article->getComments(),
            'image' => $article->getImage(),
        );
    }

    public function imageAction()
    {
        $imageId = $this->params('id');
        $image = $this->getMagazineService()->getImage($imageId);

        if (null == $image) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        return array(
            'image' => $image,
            'magazine' => $image->getMagazine(),
            'article' => $image->getArticle(),
            'comments' => $image->getComments(),
        );
    }

    public function commentAction()
    {
        $service = $this->getMagazineService();
        $on = $this->params('on');
        $id = $this->params('id');

        if ('article' == $on) {
            $item = $service->getArticle($id);
        } else {
            $item = $service->getImage($id);
        }

        if (null == $item) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $request = $this->getRequest();
        $form = new CommentForm();

        $magazine = $item->getMagazine();
        $article = (method_exists($item, 'getArticle'))
            ? $item->getArticle()
            : null;

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = array_merge($form->getData(), array('on' => $on, 'id' => $id));
                $service->saveComment($data);
                $this->redirect()->toRoute($on, array('id' => $id));
            }
        }

        return array(
            'id' => $id,
            'on' => $on,
            'item' => $item,
            'magazine' => $magazine,
            'article' => $article,
            'form' => $form,
        );
    }

    public function getMagazineService()
    {
        return $this->magazineService;
    }

    public function setMagazineService($magazineService)
    {
        $this->magazineService = $magazineService;
        return $this;
    }
}
