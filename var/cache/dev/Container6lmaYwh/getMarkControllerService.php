<?php

namespace Container6lmaYwh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMarkControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\MarkController' shared autowired service.
     *
     * @return \App\Controller\MarkController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/MarkController.php';

        $container->services['App\\Controller\\MarkController'] = $instance = new \App\Controller\MarkController(($container->services['doctrine'] ?? $container->getDoctrineService()), ($container->privates['App\\Repository\\MarkRepository'] ?? $container->load('getMarkRepositoryService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\UserSubjectRepository'] ?? $container->load('getUserSubjectRepositoryService')));

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\MarkController', $container));

        return $instance;
    }
}
