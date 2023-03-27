<?php

namespace Container6lmaYwh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAdminTimetableControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AdminPanel\AdminTimetableController' shared autowired service.
     *
     * @return \App\Controller\AdminPanel\AdminTimetableController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AdminPanel/AdminTimetableController.php';

        $container->services['App\\Controller\\AdminPanel\\AdminTimetableController'] = $instance = new \App\Controller\AdminPanel\AdminTimetableController(($container->services['doctrine'] ?? $container->getDoctrineService()));

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\AdminPanel\\AdminTimetableController', $container));

        return $instance;
    }
}
