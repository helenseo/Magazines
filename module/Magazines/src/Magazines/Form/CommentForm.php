<?php
namespace Magazines\Form;

use Zend\Form\Form;

class CommentForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('comment');

        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'class' => 'sr-only',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Name',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'Email',
                'label_attributes' => array(
                    'class' => 'sr-only',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Email',
            ),
        ));

        $this->add(array(
            'name' => 'url',
            'type' => 'text',
            'options' => array(
                'label' => 'URL',
                'label_attributes' => array(
                    'class' => 'sr-only',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'URL',
            ),
        ));

        $this->add(array(
            'name' => 'comment',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Comment',
                'label_attributes' => array(
                    'class' => ' sr-only',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control',
                'rows' => 4,
                'placeholder' => 'Your comment (be nice).',
            ),
        ));
    }
}