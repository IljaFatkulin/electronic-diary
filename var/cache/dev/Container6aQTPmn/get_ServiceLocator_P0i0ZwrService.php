<?php

namespace Container6aQTPmn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_P0i0ZwrService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.p0i0Zwr' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.p0i0Zwr'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'timetableRepository' => ['privates', 'App\\Repository\\TimetableRepository', 'getTimetableRepositoryService', true],
        ], [
            'timetableRepository' => 'App\\Repository\\TimetableRepository',
        ]);
    }
}
