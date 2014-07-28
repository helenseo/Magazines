<?php
namespace Magazines;

return array(
    'controllers' => array(
        'factories' => array(
            'Magazines\Controller\Index' => 'Magazines\Controller\IndexControllerFactory',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Magazines\Service\MagazineService' => 'Magazines\Service\MagazineServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'router' => array(
        'routes' => array(

            /*
            urls we support

            / list all the magazines
            /magazine/id one magazine
            /article/id one artcle w/ comments
            /image/id one image w/ comments
            /comment/on/id form to comment on article or image and the id of said image

            // */

            'home' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Magazines\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'magazine' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/magazine/:id',
                    'constraints' => array(
                        'id'   => '[1-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Magazines\Controller\Index',
                        'action'     => 'magazine',
                    ),
                ),
            ),
            'article' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/article/:id',
                    'constraints' => array(
                        'id'   => '[1-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Magazines\Controller\Index',
                        'action'     => 'article',
                    ),
                ),
            ),
            'image' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/image/:id',
                    'constraints' => array(
                        'id'   => '[1-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Magazines\Controller\Index',
                        'action'     => 'image',
                    ),
                ),
            ),
            'comment' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/comment/:on/:id',
                    'constraints' => array(
                        'on' => 'article|image',
                        'id'   => '[1-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Magazines\Controller\Index',
                        'action'     => 'comment',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'magazines' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => array(),
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);
